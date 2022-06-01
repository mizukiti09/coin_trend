<template>
    <div>
        <div class="p-trend__each__title">各銘柄情報</div>

        <div 
            class="p-trend__each__item u-fade-right" 
            v-for="(data, i) in select_coins" 
            :key="i">
                <div class="p-trend__each__number"></div>
                <div class="p-trend__each__right">
                    <div class="p-trend__each__name">コイン名</div>
                    <div class="u-fade-up"><a :href="'https://twitter.com/search?q=' + data.name + '&src=typed_query&f=top'" class="u-twitter-link">{{ data.name }}</a></div>
                    <div class="p-trend__each__tweets">ツイート件数</div>
                    <div class="u-fade-up" v-if="data.hour_ago">過去1時間：{{ data.hour_ago }}件</div>
                    <div class="u-fade-up" v-if="data.day_ago">過去1日：{{ data.day_ago }}件</div>
                    <div class="u-fade-up" v-if="data.week_ago">過去1週間：{{ data.week_ago }}件</div>
                    <div class="p-trend__each__price">24時間最高取引価格</div>
                    <div class="u-fade-up" v-if="data.high">{{ data.high }}</div>
                    <div class="u-fade-up" v-else >不明</div>
                    <div class="p-trend__each__price">24時間最安取引価格</div>
                    <div class="u-fade-up" v-if="data.low">{{ data.low }}</div>
                    <div class="u-fade-up" v-else >不明</div>
                </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['select_coins'],
    data: function() {
        return {
            
        }
    },
    methods: {
    },
}
</script>
