<template>
    <h3>Articles</h3>

    <div class="row">
        <div
            class="col-sm d-flex flex-wrap d-flex justify-content-start align-items-center"
        >
            <!-- Get Articles -->
            <div class="alert alert-danger" v-if="error" role="alert">
                {{ error }}
            </div>

            <ArticleForm
                :article="article"
                v-show="article.title"
                :header="article.title"
                @close-form="$emit('closeEditForm')"
                @send-update-request="$emit('sendUpdateRequest')"
            />

            <div :key="article.id" v-for="article in articles">
                <Article
                    @delete-article="$emit('send-delete-request', article.id)"
                    @show-form="$emit('showEditForm', article.id)"
                    :article="article"
                />
            </div>
        </div>
    </div>
</template>

<script>
import Article from "./Article";
import ArticleForm from "./ArticleForm";

export default {
    name: "Articles",
    data() {
        return {
            article: {},
            error: "",
            text: "",
            showForm: false,
        };
    },
    props: {
        articles: Array,
    },
    components: {
        Article,
        ArticleForm,
    },
    methods: {},
    emits: ["closeEditForm", "sendUpdateRequest", "showEditForm"],
};
</script>

<style scoped>
h3 {
    font-family: "Times New Roman", Times, serif;
}
</style>
