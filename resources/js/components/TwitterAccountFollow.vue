<template>
    <div>
        <div class="p-follow__account c-section__item" v-for="(data, i) in accounts" :key="i" ref="account">
            <div class="p-follow__info">
                <div class="p-follow__avatar">
                    <a :href="'https://twitter.com/' + data.screen_name">
                                                <img class="u-img" :src="data.profile_image_url.replace( '_normal.', '.')" alt="">
                                            </a>
                </div>
                <div class="p-follow__name u-border-b">{{ data.name }}</div>
                <div class="p-follow__nickname u-border-b">@{{ data.screen_name }}</div>
                <div class="p-follow__status">
                    <div class="p-follow__followCount">{{ data.friends_count }} フォロー中</div>
                    <div class="p-follow__followerCount">{{ data.followers_count }} フォロワー数</div>
                </div>
    
                <button class="c-btn-follow" v-on:click="follow(data.screen_name, i)">フォロー</button>
            </div>
            <div class="p-follow__info">
                <div class="p-follow__prof">
                    <div class="p-follow__title u-border-b">
                        プロフィール
                    </div>
                    <p>{{ data.description }}</p>
                </div>
                <div class="p-follow__tweet">
                    <div class="p-follow__title u-border-b">
                        最新のツイート
                    </div>
                    <div v-if="data.status.retweeted_status">{{data.status.retweeted_status.full_text }}</div>
                    <div v-else>
                        {{data.status.full_text }}
    
                        <div v-if="data.status.entities.media" class="p-follow__tweet__img">
                            <img class="u-img" :src="data.status.entities.media[0].media_url_https" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['accounts', 'user_id'],
    data: function() {
        return {
            clickFollowCount: 0,
        }
    },
    methods: {
        follow: function($nickname, $key) {
            const formData = new FormData()

            console.log(this.clickFollowCount + 1)

            this.clickFollowCount = this.clickFollowCount + 1;
            
            formData.append('nickname', $nickname)
            formData.append('user_id', this.user_id)

            console.log($nickname)
            this.$axios.post('/api/twitter/follow', formData)
                .then((res) => {
                    console.log(res)
                    var ref = this.$refs.account[$key]
                    ref.style.display = 'none'

                    if (this.clickFollowCount === this.accounts.length) {
                        console.log('リロード')
                        window.location.reload()
                    }
                })
                .catch((error) => {
                    console.log('followは正常に起動していません。')
                    console.log(error)
                })
        }

    },
}
</script>
