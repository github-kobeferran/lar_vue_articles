<template>    
    <div class="card text-left m-2 shadow" >
        <div class="card-header">
            <div class="float-end">
                <Button
                    @click="$emit('show-form', article.id)"
                    type="edit"
                    color="btn-info"
                    icon="pencil"
                />
                <Button
                    @click="confirmDelete(article)"
                    type="delete"
                    color="btn-danger"
                    icon="trash"
                />
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title fw-bold">{{ article.title }}</h5>
            <p class="card-text  ">
                {{ article.body }}
            </p>
        </div>
        <div class="card-footer text-muted">
            {{ article.date_to_string }}
        </div>
    </div>
</template>

<script>
import ArticleForm from "./ArticleForm";
import Button from "./Button";

export default {
    name: "Article",
    data() {
        return {
            editMode: false,
        };
    },
    components: {
        Button,
        ArticleForm,
    },
    props: {
        article: Object,
    },
    methods: {
        confirmDelete(article){
            if(confirm(`Delete ${article.title} ?`)){
                this.$emit('delete-article', article.id)
            }
        }
    },
    emits: ['toggle-edit-form', 'showForm']

};
</script>

<style scoped>
 p {
  margin: 0;
  text-indent: 25%;
  text-align: justify;
}

</style>
