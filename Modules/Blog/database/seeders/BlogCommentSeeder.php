<?php

namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Sample SEO-related comment messages
       $comments = [
            "Great insights! I didn't know on-page SEO had such an impact on rankings.",
            "Can you share more about keyword placement in headings?",
            "Thanks for the tips — I’m definitely going to optimize my meta descriptions now.",
            "Do internal links still play a big role in SEO?",
            "This article helped me understand technical SEO better. Much appreciated!",
            "Is there a recommended length for blog content to rank well in 2025?",
            "I've been struggling with local SEO — this clarified a lot.",
            "Can you do a follow-up post on Google Search Console setup?",
            "What are your thoughts on AI-generated content and SEO?",
            "Awesome breakdown of schema markup — very useful!"
        ];

        $userIds = DB::table('users')->pluck('id')->toArray();
        $blogIds = DB::table('blogs')->pluck('id')->toArray();

        if (empty($userIds) || empty($blogIds)) {
            return; // Prevent seeding if no users or blogs exist
        }

        foreach ($blogIds as $blogId) {
            $commentCount = rand(2, 4); // 2-4 comments per blog

            for ($i = 0; $i < $commentCount; $i++) {
                $userId = $userIds[array_rand($userIds)];
                $commentText = $comments[array_rand($comments)];

                $commentId = DB::table('blog_comments')->insertGetId([
                    'user_id' => $userId,
                    'blog_id' => $blogId,
                    'parent_id' => null,
                    'comment' => $commentText,
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // 50% chance to add a reply
                if (rand(0, 1)) {
                    $replyUserId = $userIds[array_rand($userIds)];
                    $replyText = "Thanks for the insight! I was wondering the same.";

                    DB::table('blog_comments')->insert([
                        'user_id' => $replyUserId,
                        'blog_id' => $blogId,
                        'parent_id' => $commentId,
                        'comment' => $replyText,
                        'status' => 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
