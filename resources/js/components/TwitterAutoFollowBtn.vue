<template>
    <div>
        <button 
            class="c-btn-autoFollow" 
            :class="{ autoFollowBtnColor: btnState }" 
            v-on:click="autoFollow" 
            v-text="btnText"
            type="submit">
            Follow Start !!
        </button>
    </div>
</template>

<script>
export default {
    props: ['user_id', 'auto_follow_flg'],
    data: function() {
        return {
            btnState: false,
            btnText: 'Follow Start !!',
        }
    },
    mounted() {
        if (this.auto_follow_flg === 0) {
            this.btnState = false
            this.btnText = 'Follow Start !!'
        } else if (this.auto_follow_flg === 1){
            this.btnState = true
            this.btnText = 'Follow Stop'
        }
    },
    methods: {
        // クリックしたら自動フォロー
        autoFollow: function(){

            const formData = new FormData()

            formData.append('user_id', this.user_id)
            formData.append('auto_follow_flg', this.auto_follow_flg)

            if (this.auto_follow_flg === 0) {

            console.log('自動フォロー')

            this.$axios.post('/api/twitter/autoFollow', formData)
                .then((res) => {
                    console.log(res)
                    window.location.reload(false)
                })
                .catch((error) => {
                    console.log('autoFollowは正常に起動しました。')
                    console.log(error)
                })

            } else if (this.auto_follow_flg === 1){

                console.log('自動フォローストップ')

                this.$axios.post('/api/twitter/stopAutoFollow', formData)
                    .then((res) => {
                        console.log(res)
                        window.location.reload(false)
                    })
                    .catch((error) => {
                        console.log('stopAutoFollowは正常に起動していません。')
                        console.log(error)
                    })
            }
        }
    }
}
</script>