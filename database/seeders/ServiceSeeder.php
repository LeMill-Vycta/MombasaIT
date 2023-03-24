<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;


class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::insert ([
            'name'=>'Email Marketing',
        'description'=>'Email marketing is a digital marketing strategy used by thousands of businesses worldwide. It can be described as a form of marketing that can make the customers on your email list aware of new product, discounts and other services.',
        'image'=>'1642673617.png',
        'average_price'=>'KES. 5,000 - 10,000',
        'option_1'=>'Email Newsletter setup',
        'option_2'=>'Email Sequence',
        'option_3'=>'Email Monitization'
        ]);
        Service::insert ([
            'name'=>'Paid Advertising',
        'description'=>'Paid advertising is the best approach for sending your message to the masses in the quickest way possible. We employ laser-targeted campaigns designed to reach the most relevant users, and maximize conversion rates.',
        'image'=>'1642673550.png',
        'average_price'=>'KES. 20,000 - 50,000',
        'option_1'=>'Google Ads',
        'option_2'=>'Facebook Ads',
        'option_3'=>'Twitter Ads'
        ]);
        Service::insert ([
            'name'=>'SEO',
        'description'=>'Search engine optimization services are digital marketing services that improve rankings in search results for keywords relevant to a given business.The goal here is to improve performance in organic search results while bolstering user experience.',
        'image'=>'1642673765.png',
        'average_price'=>'KES. 25,000 - 100,000',
        'option_1'=>'SEO audits',
        'option_2'=>'On-Page audits',
        'option_3'=>'Off-Page audits'
        ]);
        Service::insert ([
            'name'=>'Content Marketing',
        'description'=>'From strategy development to content creation, publishing to distribution and promotion, our industry-leading content marketing services are engineered to achieve your business goals. We aim at retaining and increasing the online target audience.',
        'image'=>'1642673871.png',
        'average_price'=>'KES. 20,000 - 150,000',
        'option_1'=>'Article & Written Content',
        'option_2'=>'Video Content',
        'option_3'=>'Infographics'
        ]);
        Service::insert ([
            'name'=>'Funnel Optimization',
        'description'=>'All the traffic in the world means nothing if it’s not converting into paying customers, sales, or clients. Optimizing your conversion rate is an essential part of digital marketing, and one we know well here at Mombasa IT Company.',
        'image'=>'1642675465.png',
        'average_price'=>'KES. 40,000 - 200,000',
        'option_1'=>'Analytical Analysis',
        'option_2'=>'A/B Testing',
        'option_3'=>'Conversion Optimization'
        ]);
        Service::insert ([
            'name'=>'Social Media',
        'description'=>'Drive a return on investment (ROI) from places like Facebook, Instagram, and LinkedIn with social media services from Mombasa IT. With this service, your business can start growing its brand awareness and generate revenue from social media platforms.',
        'image'=>'1642674249.png',
        'average_price'=>'KES. 30,000 - 300,000',
        'option_1'=>'Content Creation',
        'option_2'=>'Community Management',
        'option_3'=>'Social Media Growth'
        ]);
        Service::insert ([
            'name'=>'Website Development',
        'description'=>'Your website needs to harmonize functionality with beauty, enticing visitors to explore pages while supporting your commercial and marketing efforts. It’s a careful balancing act between utility, aesthetics and tangible results.',
        'image'=>'coding.png',
        'average_price'=>'KES. 30,000 - 200,000',
        'option_1'=>'Single Page Applications',
        'option_2'=>'Content Management System',
        'option_3'=>'Domain Name & Hosting'
        ]);
        Service::insert ([
            'name'=>'Business Consultancy',
        'description'=>'Our business consultants can help you adapt to today’s market dynamics and continue to compete no matter the threats you might be facing. We place a heavy focus on enabling and sustaining change for continuous business improvement.',
        'image'=>'analysis.png',
        'average_price'=>'KES. 25,000 - 100,000',
        'option_1'=>'Strategic Planning',
        'option_2'=>'Operations Optimization',
        'option_3'=>'Enterprise Portfolio'
        ]);
        Service::insert ([
            'name'=>'Business Startup',
        'description'=>'Small businesses and new businesses startups are not small to us. We really enjoy working with startup companies to help them navigate the business start-up and setup. We help with the documentation, tax obligation and planning for the new business.',
        'image'=>'startup.png',
        'average_price'=>'KES. 25,000 - 150,000',
        'option_1'=>'Company Registration',
        'option_2'=>'Company Name Search',
        'option_3'=>'Company Profile Writing'
        ]);
    }
}
