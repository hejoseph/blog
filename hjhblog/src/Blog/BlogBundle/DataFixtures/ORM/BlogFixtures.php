<?php

namespace Blog\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Blog\BlogBundle\Entity\Blog;

class BlogFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $blog1 = new Blog();
        $blog1->setTitle('50 enterprise startups to bet your career on in 2016');
        $blog1->setContent('Company name: Docker
Headquarters: San Francisco
Funding to date: $180 million in 5 rounds

Docker is a company that came on like wildfire in 2014 and continued to burn hot through 2015.

It created a whole new industry called "containers." 

With Docker, programmers put their code into its containers and the code runs well on all sorts of clouds and all sorts of devices. All the big cloud providers support Docker and in the past year, a whole bunch of competing containers from big guys (like Google) to startups have entered the market.

But Docker is still the big Kahuna.
<div class="slide-module clearfix"><h3 class="slide-title">Cloudera: big-data software that enterprises love</h3><div class="slide-content"><div class="KonaFilter image-container slide-image on-image"><div><img src="http://static1.uk.businessinsider.com/image/5659a5ecdd0895fb438b46fa-1200/cloudera-big-data-software-that-enterprises-love.jpg" alt="Cloudera: big-data software that enterprises love" border="0" class="slide-image on-image"></div><span><span class="source"><span>YouTube/EnterpriseCIOForum</span></span></span><p class="caption">Cloudera\'s new CEO Tom Reilly.</p></div>
<p><strong>Company name:</strong><span>&nbsp;Cloudera</span><br><strong>Headquarters:</strong><span>&nbsp;Palo Alto, California</span><br><strong>Funding to date:</strong><span> <a href="https://www.crunchbase.com/organization/cloudera#/entity">$1.04 billion</a>&nbsp;in 8 rounds</span></p>
<p class="p1">Cloudera is one of the largest companies in a particular big-data field called&nbsp;Hadoop, a popular, open-source, and low-cost way of storing loads of data.&nbsp;</p>
<p class="p1">Its most recent funding came two years ago from Intel, which invested $740 million at nearly a $5 billion valuation.</p>
<p class="p1">But 2015 was still a growth year for Cloudera.&nbsp;While other unicorns valuations (and fates) seem to be wavering, Fidelity Investments <a href="http://fortune.com/2015/11/11/snapchat-isnt-the-only-startup-in-fidelitys-crosshairs/">recently&nbsp;increased its valuation on its investment in Cloudera.</a></p>
</div></div>
');
        $blog1->setCreated(new \DateTime());
        $blog1->setUpdated($blog1->getCreated());
        $blog1->setPopularity(1);
        $blog1->setPicture($manager->merge($this->getReference('picture-1')));
        // $blog1->setBlogger($manager->merge($this->getReference('blogger-2')));
        $blog1->addComment($manager->merge($this->getReference('comment-1')));
        $blog1->addComment($manager->merge($this->getReference('comment-2')));
        $blog1->addComment($manager->merge($this->getReference('comment-3')));
        // $blog1->setCategory($manager->merge($this->getReference('category-1')));
        $manager->persist($blog1);




        $blog2 = new Blog();
        $blog2->setTitle('Here\'s where the company behind the Zano mini-drone squandered its Kickstarter cash');
        $blog2->setContent('<div class="KonaBody post-content">
            
            
<p>The company behind the Zano mini-drone project that <a href="https://www.kickstarter.com/projects/torquing/zano-autonomous-intelligent-swarming-nano-drone" target="_blank">raised £2.3 million on crowdfunding site Kickstarter</a>&nbsp;has revealed where it squandered its money and apologised to those that backed the idea, <a href="http://www.bbc.co.uk/news/technology-34926371" target="_blank">the BBC reports</a>.</p>
<p>Torquing Group, <a href="http://uk.businessinsider.com/crowdfunded-zano-nano-drone-closes-down-kickstarter-2015-11" target="_blank">which imploded spectacularly last week</a>, published a pie chart showing&nbsp;where the money&nbsp;was spent.</p>
<p>The chart is quite hard to read but it reveals that most of the money was allocated to&nbsp;these four areas:</p>
<ul>
<li>46% - Stock and manufacturing</li>
<li>14% - Wages</li>
<li>9% - Purchase taxes</li>
<li>5% - Kickstarter and payment fees</li>
</ul>
<p><span class=\"KonaFilter image-container display-table"><span><span data-post-image="" class="image on-image"><img src="http://static4.uk.businessinsider.com/image/56581d4c84307662008b5bab-800-514/screen%20shot%202015-11-27%20at%2009.png" alt="Zano spending" data-mce-source="Torquing Group Ltd"><span class="source"><span>Torquing Group Ltd</span></span></span></span></span></p><p></p>
<p>Torquing Group claims a large portion of the funding&nbsp;was also used for developing the Zano prototype.&nbsp;</p>
<p>"Ultimately these upgrades coupled with delays caused by the creation of a bespoke and automatic testing rig had significant financial and timeline impacts upon the project," the Torquing Group said in a statement seen by the BBC.</p>
<p>"We would like to make a sincere apology for the understandable disappointment felt by all of those that have supported the project," Torquing Group added.&nbsp;</p>
<p>The Zano mini-drone&nbsp;was a good idea: a drone that can fit in the palm of your hand, with sensors that help it automatically detect objects and follow you, along with a camera mounted on the front. No piloting skill was necessary.</p>
<p>All in all, <a href="https://www.kickstarter.com/projects/torquing/zano-autonomous-intelligent-swarming-nano-drone/description">12,075 people backed it (at varying levels) on Kickstarter</a>, with the "first edition" version going for £189.</p>
<p>Kickstarter sent a message to backers of the Zano project, saying:&nbsp;"Like you, we\'re extremely frustrated by what\'s happened with this project."&nbsp;</p>
<p><span></span><span>The company said it plans to<span>\"co-operate fully\" with Trading Standards within Pembrokeshire County Council.</span>&nbsp;</span></p>
                                    
            
                    </div>');
        $blog2->setPicture($manager->merge($this->getReference('picture-2')));
        $blog2->setCreated(new \DateTime("2011-07-23 06:12:33"));
        $blog2->setUpdated($blog2->getCreated());
        $blog2->setPopularity(1);
        // $blog2->setBlogger($manager->merge($this->getReference('blogger-2')));
        $blog2->addComment($manager->merge($this->getReference('comment-4')));
        $blog2->addComment($manager->merge($this->getReference('comment-5')));
        $blog2->addComment($manager->merge($this->getReference('comment-6')));
        // $blog2->setCategory($manager->merge($this->getReference('category-2')));
        $manager->persist($blog2);

        $blog3 = new Blog();
        $blog3->setTitle('Tesla wants to make fully self-driving cars happen way ahead of schedule');
        $blog3->setContent('<div class="KonaBody post-content">
            
            
<p><span class="KonaFilter image-container display-table float_right"><span><span data-post-image="" class="image on-image"><span class="source"><span>Thomson Reuters</span></span></span></span></span></p><p>A week and a half ago, we learned that Tesla is on a quest to hire more engineers to accelerate the development of its self-driving car technologies.</p>
<p>Tesla was already no slouch in the autonomous-vehicle world, having released its Autopilot feature into the wild just over a month ago.</p>
<p><a href="http://www.businessinsider.com/tesla-self-driving-autopilot-system-and-it-was-incredible-2015-10">We sampled Autopilot as soon as it hit the streets</a> and were quite impressed, to put it mildly.</p>
<p>But evidently, Tesla\'s CEO isn\'t impressed enough. So <a href="http://www.businessinsider.com/tesla-looking-to-hire-software-engineers-for-autopilot-2015-11">he put out a call via Twitter for "hardcore" software engineers</a> to take Autopilot from where it is now — semiautonomous driving under certain circumstances, such as on highways — to the mythical full autonomy of the "Minority Report" type: cars that can drive themselves 100% of the time.</p>
<p>This is a hugely important development for Tesla and the auto industry. Regardless of how one feels about how Tesla got to where it is now and where it may wind up in the future, the company has provided tremendous leadership for startup automakers, electric vehicles, and autonomous driving.</p>
<p>But while&nbsp;Tesla was actually a bit late to the game, it has caught up rapidly. It now sits squarely in the middle of an industry consensus about self-driving vehicles. The view is that autonomy will evolve over the next 10 years, with major carmakers gradually adding features to their fleets. Consumers will move slowly and steadily from the "super" cruise-control features that are now appearing in cars to full autonomy.</p>
<h2>A faster future</h2>
<p>Tesla <em>was</em> part of that consensus. The more out-there ideas about self-driving cars were being explored by Google, which with its Google Car is trying to take the human driver completely out of the picture&nbsp;<em>from the get go</em>. The pace at which Tesla introduced Autopilot more or less mirrored what General Motors has been doing, just with a more aggressive go-to-market plan.</p>
<p>Until Autopilot actually wound up in Tesla vehicles.</p>
<p><span class="KonaFilter image-container display-table"><span><span data-post-image="" class="image"><img class="col-xs-12" src="http://static4.uk.businessinsider.com/image/563222e5dd08956b068b460c-1831-1034/screen%20shot%202015-10-15%20at%201.24.40%20pm.png" alt="Tesla Model S Autopilot" data-mce-source="Benjamin Zhang/Business Insider"><span class="source"><span>Benjamin Zhang/Business Insider</span></span></span></span></span></p><p></p>
<p>It was clearly a burning-bush moment for Musk. This is how it goes sometimes: You don\'t see the future until some small aspect of it appears in the present.</p>
<p>Musk isn\'t one to waste time, so little more than a month after he saw Autopilot in action, he was ready to double down on the technology. The fastest way to effect massive technological change in the early 21st century is through software. Tesla already has plenty of experience with this, effectively making its cars almost new in their capabilities through over-the-air software updates.</p>
<p>Model S sedan owners, for example, went to sleep with cars that drove dumb and woke up with cars that could drive themselves. Software did that.</p>
<p>Theoretically, Tesla vehicles are already equipped with enough cameras and sensors to drive themselves much of the time. It\'s simply a matter of orchestrating the data. And that is the challenge, so Musk has now made it his personal responsibility to tackle — the forthcoming Tesla self-driving Seal team is going to report directly to the CEO.</p>
<p><span class="KonaFilter image-container display-table"><span><span data-post-image="" class="image on-image"><img src="http://static2.uk.businessinsider.com/image/561bd5e9dd089585768b4638-937-525/screen%20shot%202015-10-12%20at%2011.18.50%20am.png" alt="Tesla Autopilot" data-mce-source="YouTube/Tesla"><span class="source"><span>YouTube/Tesla</span></span><span class="caption">How Autopilot sees other cars in traffic.</span></span></span></span></p><p></p>
<p>Everyone I\'ve spoken with in the auto industry thinks that full autonomy will probably happen, but they also know that in order to <em>achieve</em> full autonomy, massive amounts of data will have to be crunched and lots of money will have to be invested in upgraded the tech that currently allows cars to manage the cruise-control plus autonomy we now enjoy on a limited basis.</p>
<p>Musk hears that, sees how Tesla Autopilot has performed so far, and concludes that there must be a cheaper, faster solution.</p>
<h2>The solution</h2>
<p>What does he have to do to pursue it?</p>
<p>Well, he doesn\'t need to construct a factory or develop an entirely new platform. He just needs to hire some programmers, set them down in front of laptops, and hover over them like a ruthless taskmaster. I hope these people know what they\'re signing up for. Faster and cheaper doesn\'t mean easier.</p>
<p>Fortunately, Tesla has a big advantage over, say, a new entrant to the automotive game that also wants to offer disruptive autopiloting. Tesla has a fleet of some 90,000 cars, roughly, on the road right now that it can use as a vast test platform.</p>
<p><span class="KonaFilter image-container display-table"><span><span data-post-image="" class="image"><img src="http://static3.uk.businessinsider.com/image/5659e0afdd08952c4d8b458d-780-520/elon-musk-oninnovation-flickr.jpg" alt="Elon Musk" data-mce-source="OnInnovation/Flickr" data-mce-caption="Elon Musk"><span class="source"><span>OnInnovation/Flickr</span></span></span></span></span></p><p></p>
<p>Every Autopilot-enabled Tesla is already feeding data back to the mother ship, providing a basis for tweaking the technology for future updates. Tesla\'s vehicles are quite literally learning the roads that they drive on&nbsp;and are enriching the company\'s overall mapping efforts. This is something of a secret weapon for Tesla autonomous-driving initiatives: Its entire fleet can&nbsp;learn to drive itself.</p>
<h2>The bet on software</h2>
<p>If Musk is right about betting on software, then he could advance the timetable on full autonomy by half a decade. Big leaps in automotive technology are held back by hardware. In essence, cars are about as good as they can get, having been steadily improved over a century. Future progress on the hardware side will be incremental, even for Tesla.</p>
<p>That leaves the software side for game-changing innovations.</p>
<p>Musk knows this. That\'s why he isn\'t wasting any time, and I wouldn\'t bet against him. He\'s used software to alter&nbsp;the banking system (PayPal), drastically improve the automobile (Tesla), and provide a cheaper way to get rockets into space.</p>
<p>That\'s an impressive track record. A month ago, electric cars didn\'t naturally lead to autonomous driving, but now they do. Get ready to experience Tesla\'s vision of the future — a lot sooner than expected.</p>
                    </div>');
        $blog3->setCreated(new \DateTime("2011-07-16 16:14:06"));
        $blog3->setUpdated($blog3->getCreated());
        $blog3->setPopularity(2);
        $blog3->setPicture($manager->merge($this->getReference('picture-3')));
        // $blog3->setBlogger($manager->merge($this->getReference('blogger-2')));
        $blog3->addComment($manager->merge($this->getReference('comment-7')));
        $blog3->addComment($manager->merge($this->getReference('comment-8')));
        $blog3->addComment($manager->merge($this->getReference('comment-9')));
        // $blog3->setCategory($manager->merge($this->getReference('category-3')));
        $manager->persist($blog3);

        $blog4 = new Blog();
        $blog4->setTitle('The grid - A digital frontier');
        $blog4->setContent('Lorem commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra.');
        $blog4->setCreated(new \DateTime("2011-06-02 18:54:12"));
        $blog4->setUpdated($blog4->getCreated());
        $blog4->setPopularity(2);
        // $blog4->setBlogger($manager->merge($this->getReference('blogger-3')));
        $blog4->addComment($manager->merge($this->getReference('comment-10')));
        $blog4->addComment($manager->merge($this->getReference('comment-11')));
        $blog4->addComment($manager->merge($this->getReference('comment-12')));
        // $blog4->setCategory($manager->merge($this->getReference('category-1')));
        $manager->persist($blog4);

        $blog5 = new Blog();
        $blog5->setTitle('You\'re either a one or a zero. Alive or dead');
        $blog5->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elittibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque.');
        $blog5->setCreated(new \DateTime("2011-04-25 15:34:18"));
        $blog5->setUpdated($blog5->getCreated());
        $blog5->setPopularity(5);
        // $blog5->setBlogger($manager->merge($this->getReference('blogger-4')));
        $blog5->addComment($manager->merge($this->getReference('comment-13')));
        $blog5->addComment($manager->merge($this->getReference('comment-14')));
        $blog5->addComment($manager->merge($this->getReference('comment-15')));
        $blog5->addComment($manager->merge($this->getReference('comment-16')));

        // $blog5->setCategory($manager->merge($this->getReference('category-2')));
        $manager->persist($blog5);

        $manager->flush();

        $this->addReference('blog-1', $blog1);
        $this->addReference('blog-2', $blog2);
        $this->addReference('blog-3', $blog3);
        $this->addReference('blog-4', $blog4);
        $this->addReference('blog-5', $blog5);

    }


    public function getOrder()
    {
        return 2;
    }

}