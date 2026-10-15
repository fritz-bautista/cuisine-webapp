import { IoIosArrowBack, IoIosArrowForward } from "react-icons/io";
import { FaStar } from "react-icons/fa";


export default function ImageSlider() {
    return (
        <div className="flex flex-col items-center gap-10">
            <div className="flex items-center w-screen pl-60 pr-60">
                <div>
                    <button className=""> <IoIosArrowBack className="text-6xl" /> </button>
                </div>
                <div className="flex grid grid-cols-2 w-full h-150 border-1 gap-10">
                    <div>
                        <iframe src="https://maps.google.com/maps?q=Cebu%20City&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            width="100%" height="100%" style={{ border: 0 }} loading="lazy">
                        </iframe>
                    </div>
                    <div className="flex flex-col gap-5 justify-center">
                        <div>
                            <p>Cebu City</p>
                            <h1>Restaurant Name</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <div className="flex w-fit rounded-2xl shadow-lg p-5 gap-3">
                            <FaStar className="text-yellow-500 text-4xl" />
                            <FaStar className="text-yellow-500 text-4xl" />
                            <FaStar className="text-yellow-500 text-4xl" />
                            <FaStar className="text-yellow-500 text-4xl" />
                            <FaStar className="text-yellow-500 text-4xl" />
                        </div>
                        <div className="flex gap-5 overflow-hidden">
                            <img className="h-30" src="img/audience-imgs/chef.png" />
                            <img className="h-30" src="img/audience-imgs/food-enthusiast.png" />
                            <img className="h-30" src="img/audience-imgs/food-entrep.png" />
                        </div>
                    </div>
                </div>
                <div>
                    <button> <IoIosArrowForward className="text-6xl" />
                    </button>
                </div>
            </div>
            <div className="flex gap-5 w-screen justify-center overflow-hidden">
                <div className="flex w-110 border-1 p-4 items-center gap-5">
                    <img className="h-30" src="img/audience-imgs/chef.png" />
                    <div>
                        <div>
                            <h2>Restaurant Name</h2>
                            <p>Pasig City</p>
                        </div>
                        <div className="flex w-fit rounded-2xl shadow-lg p-2 gap-3 mr-auto">
                            <FaStar className="text-yellow-500 text-xl" />
                            <FaStar className="text-yellow-500 text-xl" />
                            <FaStar className="text-yellow-500 text-xl" />
                            <FaStar className="text-yellow-500 text-xl" />
                            <FaStar className="text-yellow-500 text-xl" />
                        </div>
                    </div>
                </div>
                <div className="flex w-110 border-1 p-4 items-center gap-5">
                    <img className="h-30" src="img/audience-imgs/chef.png" />
                    <div>
                        <div>
                            <h2>Restaurant Name</h2>
                            <p>Pasig City</p>
                        </div>
                        <div className="flex w-fit rounded-2xl shadow-lg p-2 gap-3 mr-auto">
                            <FaStar className="text-yellow-500 text-xl" />
                            <FaStar className="text-yellow-500 text-xl" />
                            <FaStar className="text-yellow-500 text-xl" />
                            <FaStar className="text-yellow-500 text-xl" />
                            <FaStar className="text-yellow-500 text-xl" />
                        </div>
                    </div>
                </div>
                <div className="flex w-110 border-1 p-4 items-center gap-5">
                    <img className="h-30" src="img/audience-imgs/chef.png" />
                    <div>
                        <div>
                            <h2>Restaurant Name</h2>
                            <p>Pasig City</p>
                        </div>
                        <div className="flex w-fit rounded-2xl shadow-lg p-2 gap-3 mr-auto">
                            <FaStar className="text-yellow-500 text-xl" />
                            <FaStar className="text-yellow-500 text-xl" />
                            <FaStar className="text-yellow-500 text-xl" />
                            <FaStar className="text-yellow-500 text-xl" />
                            <FaStar className="text-yellow-500 text-xl" />
                        </div>
                    </div>
                </div>
                <div className="flex w-110 border-1 p-4 items-center gap-5">
                    <img className="h-30" src="img/audience-imgs/chef.png" />
                    <div>
                        <div>
                            <h2>Restaurant Name</h2>
                            <p>Pasig City</p>
                        </div>
                        <div className="flex w-fit rounded-2xl shadow-lg p-2 gap-3 mr-auto">
                            <FaStar className="text-yellow-500 text-xl" />
                            <FaStar className="text-yellow-500 text-xl" />
                            <FaStar className="text-yellow-500 text-xl" />
                            <FaStar className="text-yellow-500 text-xl" />
                            <FaStar className="text-yellow-500 text-xl" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}

interface itemProps {

}