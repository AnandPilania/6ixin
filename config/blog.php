<?php

return [
    'name' => 'Blog',
    'models'  => [
      'template'             => Modules\Blog\Entities\Template::class,
      'topic'                => Modules\Blog\Entities\Topic::class,
      'thread'               => Modules\Blog\Entities\Thread::class,
    ],
    'table_names'     => [
    'topics'                 => 'blog_topics',
    'threads'                => 'blog_threads',
    'templates'              => 'blog_templates',
  ],
];
