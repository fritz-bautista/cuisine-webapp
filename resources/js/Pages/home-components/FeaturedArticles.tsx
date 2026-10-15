import { FaArrowRightLong } from "react-icons/fa6";

function FeaturedArticles() {
    return (
        <div className="flex flex-col justify-center">
            <div className="flex flex-col xl:grid xl:grid-cols-2 gap-10">
                <div className="col-span-2">
                    <h1>Featured Article</h1>
                </div>
                <div className="flex flex-col w-full border-1">
                    <img className="h-80 2xl:h-100 object-cover" src="img/About/about-last.png" />
                    <div className="p-10">
                        <p>Posted on Sep 30, 2026</p>
                        <h2>Article Name</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                    </div>
                    <FaArrowRightLong className="ml-auto m-10 text-xl"/>
                </div>
                <div className="flex grid grid-rows-3 w-full gap-5">
                    <div className="flex w-full border-1 items-center gap-5">
                        <img className="w-50 2xl:w-60 h-full object-cover" src="img/About/about-last.png" />
                        <div>
                            <p>Posted on Sep 30, 2026</p>
                            <h2>Article Name</h2>
                            <p>Author Name</p>
                        </div>
                    </div>
                    <div className="flex w-full border-1 items-center gap-5">
                        <img className="w-50 2xl:w-60 h-full object-cover" src="img/About/about-last.png" />
                        <div>
                            <p>Posted on Sep 30, 2026</p>
                            <h2>Article Name</h2>
                            <p>Author Name</p>
                        </div>
                    </div>
                    <div className="flex w-full border-1 items-center gap-5">
                        <img className="w-50 2xl:w-60 h-full object-cover" src="img/About/about-last.png" />
                        <div>
                            <p>Posted on Sep 30, 2026</p>
                            <h2>Article Name</h2>
                            <p>Author Name</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default FeaturedArticles;