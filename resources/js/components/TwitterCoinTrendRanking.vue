<template>
    <div>
        <span v-if="coin_info">更新日時：{{coin_info[0]['updated_at']}}</span>
        <div class="p-trend__ranking__title">ツイート件数ランキング</div>
        <div class="p-trend__ranking__item u-fade-right" v-for="(data, i) in coin_info" :key="i">
            <div class="p-trend__ranking__number">順位<br>{{ i + 1 }}</div>
            <div class="p-trend__ranking__right">
                <div class="p-trend__ranking__name">コイン名</div>
                <div class="u-fade-up"><a :href="'https://twitter.com/search?q=' + data.name + '&src=typed_query&f=top'" class="u-twitter-link">{{ data.name }}</a></div>
                <div class="p-trend__ranking__tweets">件数</div>
                <div class="u-fade-up" v-if="data.hour_ago">{{ data.hour_ago }}</div>
                <div class="u-fade-up" v-if="data.day_ago">{{ data.day_ago }}</div>
                <div class="u-fade-up" v-if="data.week_ago">{{ data.week_ago }}</div>
                <div class="p-trend__ranking__price">24時間最高取引価格</div>
                <div class="u-fade-up" v-if="data.high">{{ data.high }}</div>
                <div class="u-fade-up" v-else >不明</div>
                <div class="p-trend__ranking__price">24時間最安取引価格</div>
                <div class="u-fade-up" v-if="data.low">{{ data.low }}</div>
                <div class="u-fade-up" v-else >不明</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['coin_info'],
    data: function() {
        return {
            
        }
    },
    methods: {
    },
}
</script>
