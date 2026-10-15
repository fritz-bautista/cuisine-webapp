function MoreArticles() {
    return (
        <div className="flex flex-col justify-center">
            <div className="flex flex-col gap-10">
                <div className="col-span-2">
                    <h1>More Articles</h1>
                </div>
                <div className="flex gap-10">
                    <div className="flex flex-col w-2/3 gap-5">
                        <div className="flex border-1">
                            <img className="w-70 2xl:w-70 object-cover" src="img/About/about-last.png" />
                            <div className="p-10">
                                <p>Posted on Sep 30, 2026</p>
                                <h2>Article Name</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                            </div>
                        </div>
                        <div className="flex border-1">
                            <img className="w-70 2xl:w-70 object-cover" src="img/About/about-last.png" />
                            <div className="p-10">
                                <p>Posted on Sep 30, 2026</p>
                                <h2>Article Name</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                            </div>
                        </div>
                        <div className="flex border-1">
                            <img className="w-70 2xl:w-70 object-cover" src="img/About/about-last.png" />
                            <div className="p-10">
                                <p>Posted on Sep 30, 2026</p>
                                <h2>Article Name</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                            </div>
                        </div>
                        <div className="flex border-1">
                            <img className="w-70 2xl:w-70 object-cover" src="img/About/about-last.png" />
                            <div className="p-10">
                                <p>Posted on Sep 30, 2026</p>
                                <h2>Article Name</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                            </div>
                        </div>
                        <button className="Button1 p-5">View More</button>
                    </div>
                    <div className="flex w-1/3 gap-5">
                        <div className="flex flex-col w-full border-1 items-center gap-5 overflow-hidden">
                            <div className="flex w-full bg-black justify-center">
                                <h2 className="text-white p-3">Categories</h2>
                            </div>
                            <div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default MoreArticles;