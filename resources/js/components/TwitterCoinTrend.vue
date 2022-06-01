<template>
    <div class="c-section__container p-trend__container">
        <div class="p-trend__side">
            <div class="p-trend__side__head">過去ツイート集計</div>
                <div class="p-trend__side__btn__container">
                    <button 
                    data-coin="hour" 
                    v-on:click="whichTweets($event)" 
                    :class ="{activeCoinTweetsInfo: activeHourInfo}" 
                    class="p-trend__side__btn">
                    過去1時間
                </button>
                <button 
                    data-coin="day"  
                    v-on:click="whichTweets($event)" 
                    :class ="{activeCoinTweetsInfo: activeDayInfo}" 
                    class="p-trend__side__btn">
                    過去1日
                </button>
                <button 
                    data-coin="week" 
                    v-on:click="whichTweets($event)" 
                    :class ="{activeCoinTweetsInfo: activeWeekInfo}" 
                    class="p-trend__side__btn">
                    過去1週間
                </button>
            </div>
            <div class="p-trend__side__head">各銘柄情報</div>
            <div class="p-trend__side__coin__container">
                <button 
                    class="p-trend__side__coin__btn"
                    v-for="(data, i) in each_coins" 
                    :key="i"
                    v-on:click="whichEachCoin(i)"
                    ref="btn">
                    {{ data.name }}
                </button>
                <button v-on:click="reset()">リセット</button>
            </div>
        </div>
        <div class="p-trend__main">
            <div class="p-trend__ranking" v-show="showRanking">
                <twitter-coin-trend-ranking
                    :coin_info="coin_info">
                </twitter-coin-trend-ranking>
            </div>
            <div class="p-trend__coinInfo" v-show="showEach">
                <twitter-coin-trend-each
                    :select_coins="select_coins">
                </twitter-coin-trend-each>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['hour_ago', 'day_ago', 'week_ago', 'each_coins'],
    data: function() {
        return {
            coin_info: null,
            activeHourInfo: false,
            activeDayInfo: false,
            activeWeekInfo: false,
            select_coins: [],
            showRanking: false,
            showEach: false,
        }
    },
    methods: {
        whichTweets: function(event){
            this.showEach    = false
            this.showRanking = true

            if (event.target.dataset.coin === 'hour') {
                this.coin_info = this.hour_ago
                this.activeHourInfo = true
                this.activeDayInfo  = false
                this.activeWeekInfo = false
            } else if (event.target.dataset.coin === 'day') {
                this.coin_info = this.day_ago
                this.activeHourInfo = false
                this.activeDayInfo  = true
                this.activeWeekInfo = false
            } else if (event.target.dataset.coin === 'week') {
                this.coin_info = this.week_ago
                this.activeHourInfo = false
                this.activeDayInfo  = false
                this.activeWeekInfo = true
            }
        },
        whichEachCoin: function($key){
            this.showRanking    = false
            this.showEach       = true

            this.activeHourInfo = false
            this.activeDayInfo  = false
            this.activeWeekInfo = false

            // クリックされたらコインbuttonを消す
            var ref = this.$refs.btn[$key]
            ref.style.visibility = 'hidden'

            // 子コンポーネントに送る配列にデータを入れる
            this.select_coins.push(this.each_coins[$key])
        },
        reset: function(){
            this.showRanking    = false
            this.showEach       = false
            this.activeHourInfo = false
            this.activeDayInfo  = false
            this.activeWeekInfo = false

            this.select_coins = []
            this.$refs.btn.forEach(function(ref){
                ref.style.visibility = 'initial'
            });

        },
    },
}
</script>
