<?php


namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\ArticleSection;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function arti_blogs()
    {
        $articles = Article::with('category')
            ->latest()
            ->where('status', 'published') // Optional: only show published articles
            ->get();

        return view('publish.arti-blogs', compact('articles'));
    }

    public function arti_view()
    {
        return view('publish.article-view');
    }

    public function create()
    {
        $categories = Category::all(); // fetch all categories
        return view('admin.article_create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'published_at' => 'nullable|date',
            'sections' => 'nullable|array',
            'sections.*.heading' => 'required|string',
            'sections.*.content' => 'required|string',
            'sections.*.image_url' => 'nullable|url',
        ]);

        $user = auth()->user(); // ✅ use this to ensure context

        $baseSlug = Str::slug($request->title);
        $slug = $baseSlug;
        $counter = 1;

        while (Article::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter++;
        }

        $article = Article::create([
            'title' => $request->title,
            'slug' => $slug,
            'author' => $request->author,
            'category_id' => $request->category_id,
            'published_at' => $request->published_at,
            'description' => $request->description ?? null, // optional
            'status' => $request->status, // <-- use the value from the form
            'user_id' => $user->id, // ensure it's not null
        ]);

        if (!empty($validated['sections'])) {
            foreach ($validated['sections'] as $index => $section) {
                $article->sections()->create([
                    'heading' => $section['heading'],
                    'slug' => Str::slug($section['heading']), // ✅ ADD THIS
                    'content' => $section['content'],
                    'image_url' => $section['image_url'] ?? null,
                    'order' => $index,
                ]);
            }
        }
        return redirect()->route('articles.create')->with('success', 'Article created!');
    }

    public function show($id)
    {
        $article = Article::with('sections')->findOrFail($id);

        return view('publish.article-view', compact('article'));
    }

    public function edit($id)
    {
        $article = Article::with('sections')->findOrFail($id);
        $categories = Category::all();
        return view('admin.article_edit', compact('article', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::with('sections')->findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'published_at' => 'nullable|date',
            'status' => 'required|in:draft,published,scheduled',
            'description' => 'nullable|string',
            'sections' => 'nullable|array',
            'sections.*.heading' => 'required|string',
            'sections.*.content' => 'required|string',
            'sections.*.image_url' => 'nullable|url',
            'sections.*.order' => 'nullable|integer',
        ]);

        // 🔁 Ensure unique slug only if the title has changed or slug is duplicated
        $baseSlug = Str::slug($validated['title']);
        $slug = $baseSlug;
        $counter = 1;

        while (Article::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = $baseSlug . '-' . $counter++;
        }

        $article->update([
            'title' => $validated['title'],
            'slug' => $slug,
            'author' => $validated['author'],
            'category_id' => $validated['category_id'],
            'published_at' => $validated['published_at'],
            'status' => $validated['status'],
            'description' => $validated['description'] ?? null,
        ]);

        // 🔁 Sync sections: simplest way is to delete & recreate (for now)
        $article->sections()->delete();

        if (!empty($validated['sections'])) {
            foreach ($validated['sections'] as $index => $section) {
                $article->sections()->create([
                    'heading' => $section['heading'],
                    'slug' => Str::slug($section['heading']),
                    'content' => $section['content'],
                    'image_url' => $section['image_url'] ?? null,
                    'order' => $section['order'] ?? $index,
                ]);
            }
        }

        return redirect()->route('articles.edit', $article->id)->with('success', 'Article updated!');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete(); // This will also delete all related sections due to ON DELETE CASCADE

        return redirect()->route('articles.dashboard')->with('success', 'Article deleted successfully.');
    }

    public function articleDashboard()
    {
        $totalArticles = Article::count();

        $categoryCounts = Category::withCount('articles')->get()->pluck('articles_count', 'name')->toArray();

        $drafts = Article::where('status', 'draft')->with('category')->get();
        $published = Article::where('status', 'published')->with('category')->get();

        return view('admin.article_manager', compact(
            'totalArticles',
            'categoryCounts',
            'drafts',
            'published'
        ));
    }

}
