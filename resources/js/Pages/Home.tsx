import FeaturedArticles from './home-components/FeaturedArticles';
import MoreArticles from './home-components/MoreArticles';
import JoinCommunity from './home-components/JoinCommunity';
import SectionWrapper from '../components/SectionWrapper';
import FeaturedRestaurant from './home-components/FeaturedRestaurant';
import SubmitEntry from './home-components/SubmitEntry';
import UserLayout from '../layouts/UserLayout'

function Home() {
    return (
        <>
            <div className="flex flex-col w-screen">
                <SectionWrapper outerClass='mt-30'>
                    <FeaturedArticles />
                </SectionWrapper>
                <SectionWrapper>
                    <hr />
                </SectionWrapper>
                <SectionWrapper>
                    <MoreArticles />
                </SectionWrapper>
                <SectionWrapper outerClass='bg-black'>
                    <JoinCommunity />
                </SectionWrapper>
                <SectionWrapper>
                    <FeaturedRestaurant/>
                </SectionWrapper>
                <SectionWrapper>
                    <hr />
                </SectionWrapper>
                <SectionWrapper>
                    <SubmitEntry/>
                </SectionWrapper>
            </div>
        </>
    );
}

Home.layout = (page: React.ReactNode) => <UserLayout>{page}</UserLayout>;

export default Home;