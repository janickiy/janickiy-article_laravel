<template>
    <div class="row">
        <form @submit.prevent="submit_form()" v-if="!commentSuccess">
            <div class="mb-3">
                <label for="commentSubject" class="form-label">
                    Тема комментария
                </label>
                <input type="text" class="form-control" id="commentSubject" v-model="subject">
                <div class="alert alert-warning" role="alert" v-if="errorsMessage.subject">
                    {{errorsMessage.subject[0]}}
                </div>
            </div>
            <div class="mb-3">
                <label for="commentBody" class="form-label">
                    Комментарий
                </label>
                <textarea class="form-control" id="commentBody" rows="3" v-model="body"></textarea>
                <div class="alert alert-warning" role="alert" v-if="errorsMessage.body">
                    {{errorsMessage.body[0]}}
                </div>
            </div>
            <button class="btn btn-success" type="submit">Отправить</button>
        </form>
        <div class="alert alert-success" role="alert" v-else>
            Комментарий успешно отправлен!
        </div>
        <div class="pb-2 mt-5 mx-auto" style="min-width: 100%" v-for="comment in comments">

            <div class="toast show mb-2" style="width: 100%">
                <div class="toast-header">
                    <img src="https://via.placeholder.com/50/5f1138/ffffff/?text=User" class="rounded me-2" alt="">
                    <strong class="me-auto">{{ comment.subject }}</strong>
                    <small class="text-muted">{{ comment.created_at }}</small>
                </div>
                <div class="toast-body">
                    {{ comment.body }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import store from "../store";

export default {
    name: "CommentsComponent",
    data() {
        return {
            subject: '',
            body: '',
        }
    },
    computed: {
        comments() {
            return store.state.article.comments;
        },
        commentSuccess() {
            return store.state.commentSuccess;
        },
        errorsMessage() {
            return store.state.errors
        }
    },
    methods: {
        submit_form() {
            store.dispatch('addComment', {
                subject: this.subject,
                body: this.body,
                article_id: store.state.article.id
            })
        }
    },
    mounted() {
        console.log('Component comments mounted');
    }
}
</script>

<style scoped>

</style>
