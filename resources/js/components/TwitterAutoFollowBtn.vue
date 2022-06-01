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
    props: ['user_id'],
    data: function() {
        return {
            btnState: false,
            btnText: 'Follow Start !!',
        }
    },
    methods: {
        // クリックしたら自動フォロー
        autoFollow: function(){
            this.btnState = !this.btnState;
            if (this.btnText === 'Follow Start !!') {
                this.btnText = 'Follow Stop'
            } else {
                this.btnText = 'Follow Start !!'
            }
            const formData = new FormData()
            formData.append('user_id', this.user_id)

            this.$axios.post('/api/twitter/autoFollow', formData)
                .then((res) => {
                    console.log(res)
                })
                .catch((error) => {
                    console.log('autoFollowは正常に起動していません。')
                    console.log(error)
                })
        }
    }
}
</script>