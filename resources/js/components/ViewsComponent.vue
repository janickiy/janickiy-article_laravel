<template>
    <span class="badge bg-danger">{{viewsNumber}}<i class="far fa-eye"></i></span>
</template>

<script>
import store from "../store";
export default {
    name: "ViewsComponent",
    computed:{
        viewsNumber() {
            return store.getters.articleViews;
        }
    },
    mounted() {
        console.log('ViewsComponent mounted');
    }
}
</script>

<style scoped>

</style>
