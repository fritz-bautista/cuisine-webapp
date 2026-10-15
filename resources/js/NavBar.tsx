import { FaSearch } from "react-icons/fa";

export default function Navbar() {
    return (
        <div className="flex grid grid-cols-4 w-full items-center bg-white pt-5 pb-7 pr-30 pl-30 2xl:pl-60 2xl:pr-60 fixed">
            <div className="">
                <img className="w-auto h-13" src="img/logo_cropped.png"></img>
            </div>
            <div className="flex col-span-2 justify-center gap-5">
                <a>About</a>
                <a>Articles</a>
                <a>Publish With Us</a>
                <a>Community</a>
                <a>Restaurants</a>
                <FaSearch></FaSearch>
            </div>
            <div className="flex ml-auto">
                Account
            </div>
        </div>
    )
}