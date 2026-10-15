import ImageSlider from "../../components/ImageSlider"

export default function FeaturedRestaurant() {
    return (
        <div className="flex flex-col items-center gap-10">
            <div className="pt-10">
                <h1>Featured Restaurants</h1>
            </div>
            <div className="">
                <ImageSlider/>
            </div>
            <div>

            </div>
        </div>
    )
}