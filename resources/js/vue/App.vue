<template>
    <Header
        title="Articles using Laravel and Vue.js"          
        @toggle-add-form="toggleAddForm" 
        :showForm="showForm"         
    />
     <ArticleForm
        ref="form"
        v-show="showForm"        
        :header="article.title ? `Edit ${article.title}` : 'Add Form'"
        :article="article"
        @send-post-request="storeArticle"
        @send-update-request="updateArticle"
        @close-form="closeForm"
    />
    <Articles 
        :articles="articles"
        @close-edit-form="closeEditForm"
        @send-update-request="updateArticle"
        @show-edit-form="showEditForm"
    />
</template>

<script>
import ArticleService from "./ArticleService";
import Header from "./components/Header";
import Articles from "./components/Articles";
import ArticleForm from "./components/ArticleForm";

export default {
    name: "App",
    components: {
        Header,        
        ArticleForm,
        Articles
    },
    data() {
        return {
            articles: [],
            article: {},
            showForm: false,
        };
    },
    methods: {
        async storeArticle(article) {
            try {
                await ArticleService.storeArticle(article);
                this.articles = await ArticleService.getArticles();
                this.showForm = false;
            } catch (err) {
                this.error = err.message;
            }
        },
        async showEditForm(id) {
            try {
                this.showForm = false;
                this.article = await ArticleService.getArticle(id);
                this.showForm = true;
            } catch (err) {
                this.error = err.message;
            }
        },
        async updateArticle(id, updatedArticle) {
            try {
                ArticleService.updateArticle(id, updatedArticle);
                this.articles = await ArticleService.getArticles();

                this.article = {};
                this.showForm = false;
            } catch (err) {
                this.error = err.message;
            }
        },
        async deleteArticle(id) {
            try {
                await ArticleService.deleteArticle(id);
                this.articles = await ArticleService.getArticles();

                this.article = {};
                this.showForm = false;
            } catch (err) {
                this.error = err.message;
            }
        },
        toggleAddForm() {
            // if (this.showForm) {
            //     this.article = {};
            //     this.showForm = false;
            // }

            this.showForm = !this.showForm;            
        },
        closeEditForm() {
            this.article = {};
        },
        closeForm() {
            this.showForm = false;
        },
    },
    async created() {
        try {
            this.articles = await ArticleService.getArticles();
        } catch (err) {
            error = err.message;
        }
    },
};
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap");

body {
    font-family: "Poppins", sans-serif;
}
</style>
