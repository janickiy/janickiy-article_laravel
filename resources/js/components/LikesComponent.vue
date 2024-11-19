<template>
    <span
        @click="addLike()"
        class="badge likes-button"
        :class="isLike ? 'bg-primary' : 'bg-danger'">
        {{likeNumber}}<i class="far fa-thumbs-up"></i>
    </span>
</template>

<script>
import store from "../store";

export default {
    name: "LikesComponent",
    computed: {
        isLike() {
            return store.state.likeIt;
        },
        likeNumber() {
            return store.getters.articleLikes;
        }
    },
    methods: {
        addLike() {
            store.dispatch('addLike', {
                slug: store.state.slug,
                increment: this.isLike,
            });
        }
    },
    mounted() {
        console.log('Components likes mounted');
    }
}
</script>

<style scoped>

.likes-button {
    cursor: pointer;
}

</style>
