<template>
    <div>
        <div class="p-news__article c-section__item" v-for="(data,i) in list_gn" :key="i">
            <div class="p-news__headLine"><a class="c-link" :href="data.url" target="_blank">{{ data.title }}</a></div>
            <div>{{ data.pubDate }}</div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['list_gn'],
    data: function() {

    },
    methods: {
    },
}
</script>
