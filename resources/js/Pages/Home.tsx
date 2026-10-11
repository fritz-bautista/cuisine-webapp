import FeaturedArticles from './home-components/FeaturedArticles';
import MoreArticles from './home-components/MoreArticles';
import JoinCommunity from './home-components/JoinCommunity';

function Home() {
    return (
        <>
            <div className="w-screen p-30 2xl:pl-60 2xl:pr-60 pt-20">
                <FeaturedArticles/>
                <hr className="mt-20 mb-20" />
                <MoreArticles/>
                <JoinCommunity/>
            </div>
        </>
    );
}

export default Home;