<template>
    <div class="container my-2 border-bottom">
        <div class="row">
            <div class="col-8 py-2">
                <h1>{{ title }}</h1>
            </div>
            <div class="col-4 text-end py-2 mx">
                <button
                    @click="toggleAdd"
                    :class="showForm ? 'btn-dark' : 'btn-success'"
                    class="btn"
                >
                    {{ showForm ? "Close Form" : "Add an Article" }}
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import Button from "./Button";

export default {
    name: "Header",
    data() {
        return {            
        };
    },
    props: {
        title: String,
        showForm : {
            default: false,
            type: Boolean
        }
    },
    components: {
        Button,        
    },
    methods: {
        toggleAdd() {            
            this.$emit("toggleAddForm");
        },
    },
};
</script>

<style scoped></style>
