<template>
    <div class="row mt-5">
        <div class="col-12 p3">
            <img :src="article.img" alt="img" class="border rounded mx-auto d-block">
            <h5 class="mt-5">{{ article.title }}</h5>
            <p>
                <span class="tag" v-for="(tag,index) in article.tags" >
                    <span v-if="tagsLen == (index+1)">{{ tag.label }}</span>
                    <span v-else>{{ tag.label }} | </span>
                </span>
            </p>
            <p class="card-text">{{ article.body }}</p>
            <p>Опубликованно: <i>{{article.created_at}}</i></p>
            <div class="mt-3">
                <views-component />
                <likes-component />
            </div>
        </div>
    </div>
</template>

<script>
import store from "../store";
import ViewsComponent from "./ViewsComponent";
import LikesComponent from "./LikesComponent";

export default {
    components: {
        ViewsComponent,
        LikesComponent
    },
    computed: {
        article() {
            return store.state.article;
        },
        tagsLen() {
            return store.state.article.tags.length;
        },
        likes() {
            return store.getters.articleLikes;
        }
    },
    mounted() {
        console.log('Component mounted.')
        console.log(store.state.article.tags)
    }
}
</script>

<style scoped>

</style>
