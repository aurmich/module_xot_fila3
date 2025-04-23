@php
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
@endphp
<rss version="2.0">
    <channel>
        <title><![CDATA[ {{ config('metatag.title') }} ]]></title>
        <link><![CDATA[ {{ url('/') }} ]]></link>
        <description><![CDATA[ {{ config('metatag.description') }} ]]></description>
        <language>{{ $lang }}</language>
        <pubDate>{{ now() }}</pubDate>
        @foreach ($items as $item)
            <item>
                <title><![CDATA[{{ $item->title }}]]></title>
                <subtitle><![CDATA[{{ $item->subtitle }}]]></subtitle>
                {{-- guid o cosa? --}}
                <link> {{ url(Panel::make()->get($item)->url()) }} </link>
                <description><![CDATA[{!! $item->txt !!}]]></description>
                {{-- in category post_type? oppure togliamo il tag? oppure cosa?--}}
                <category>{{ $item->post_type }}</category>
                <author><![CDATA[{{ $item->created_by }}]]></author>
                {{-- guid o id?? --}}
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                <guid>{{ $item->id }}</guid>
=======
                <guid>{{ $item-> }}</guid>
>>>>>>> e5c56c3 (.)
=======
=======
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
                <guid>{{ $item-> }}</guid>
                <guid>{{ $item-> }}</guid>
                <guid>{{ $item->id }}</guid>
<<<<<<< HEAD
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
                <guid>{{ $item->id }}</guid>
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
                <guid>{{ $item->id }}</guid>
>>>>>>> c2dac53 (.)
                <pubDate>{{ $item->created_at->toRssString() }}</pubDate>
            </item>
        @endforeach
    </channel>
</rss>