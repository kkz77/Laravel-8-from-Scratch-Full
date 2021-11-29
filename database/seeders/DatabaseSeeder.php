<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        User::truncate();
        Category::truncate();
        Post::truncate();
         $user = User::factory()->create();
         $javascript = Category::create([
             'name' => 'Javascript',
             'slug' => 'javascript'
         ]);

         $python = Category::create([
             'name' => 'Python',
             'slug' => 'python'
         ]);

         Post::create([
             'user_id' => $user->id,
             'category_id' => $javascript->id,
             'title' => 'JavaScript From The Beginning',
             'slug' => 'my-first-post',
             'excerpt' => 'ဒီ Course လေးကတော့ OOP အခြေခံ Javascript အခြေခံနဲ့တွေကို Real World Project 10 ',
             'body'=>'ဒီ Course လေးကတော့ OOP အခြေခံ Javascript အခြေခံနဲ့တွေကို Real World Project 10 ခုနဲ့သင်ပေးထားတဲ့ Beginner တွေအတွက် လေ့လာလို့ကောင်းမယ့် Javascript course ကောင်းလေးတစ်ခုပဲဖြစ်ပါတယ်။'
         ]);

         Post::create([
             'user_id' => $user->id,
             'category_id' => $python->id,
             'title' => 'The Art of Doing Code 40 Challenging Python Programs Today',
             'slug' => 'my-second-post',
             'excerpt' => 'ဒီ Course လေးရယ့်ထူးခြားတာကတော့ Python ကို ဒီတိုင်းသင်တာမျိုးမဟုတ်ဘဲ Code ',
             'body'=>'ဒီ Course လေးရယ့်ထူးခြားတာကတော့ Python ကို ဒီတိုင်းသင်တာမျိုးမဟုတ်ဘဲ Code ရေးနည်းသဘောတရားတစ်ခုဆီကို App တစ်ခုနဲ့ App ပေါင်း ၄၀ ကျော်ရေးပြထားတဲ့ Udemy Course ကောင်းလေးပဲဖြစ်ပါတယ်။'
         ]);

         Post::create([
             'user_id' => $user->id,
             'category_id' => $javascript->id,
             'title' => 'JavaScript For Beginners',
             'slug' => 'my-third-post',
             'excerpt' => 'Java Script Learn all about one of the most widely used programming languages and get this great book now!',
             'body' => 'Would you be interested in learning JavaScript, one of the most commonly used languages in programming which can help you create interactive websites? Then learning about Java Script would be perfect for you. Without proper guidance and the right information, learning Java Script can be quite challenging so you need to find a really helpful source – such as an ebook, to make things easier It’s a fact that Java Script is probably the simplest, most flexible and efficient languages which can be used to broaden the functions on websites. Learning about Java Script will not only help you understand the basics of building websites but it would also allow you to get ahead at work with your newfound computer skills. Nowadays we are becoming more and more dependent on technology so acquiring new knowledge in the field is a definite plus! Read on and learn about the many of the benefits of Java Script as well as all other information you may need to understand from buying your own copy.'
         ]);
    }
}
