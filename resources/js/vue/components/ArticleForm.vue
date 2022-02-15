<template>
    <div class="card text-center m-2 shadow" ref="me" :class="{ shake: disabled }">
        <div
            class="card-header"            
            :style="{
                background: articleLocal.title ? '#00aeff' : '#34c200',
                color: 'white',
            }"
        >
            <h4 class="fw-bold">
                {{ header }}
                <span
                    @click="$emit('close-form')"
                    v-if="articleLocal.title"
                    class="btn btn-danger float-end"
                >
                    <font-awesome-icon icon="circle-xmark" />
                </span>
            </h4>
        </div>
        <div class="card-body">
            <input
                type="text"
                name="title"
                id=""
                class="form-control my-2"
                placeholder="Title"
                v-model="title"
            />
            <p class="card-text">
                <textarea
                    name="body"
                    id=""
                    class="form-control my-2"
                    placeholder="Body"
                    v-model="body"
                ></textarea>
            </p>
            <button
                @click.prevent="updateArticle(article.id)"
                v-if="article.title"
                class="btn btn-primary float-end"
            >
                Save
            </button>
            <button
                @click.prevent="onSubmit"
                v-else
                class="btn btn-success float-end"
            >
                Add
            </button>
        </div>

        <div v-if="articleLocal" class="card-footer text-muted">
            {{ articleLocal.date_to_string }}
        </div>
    </div>
</template>

<script>
import Button from "./Button";

export default {
    name: "ArticleForm",
    data() {
        return {
            title: "",
            body: "",
            disabled: false,
        };
    },
    components: {
        Button,
    },
    props: {
        header: {
            default: "Add Article",
            type: String,
        },
        article: {
            type: Object,
        },
    },
    methods: {
        onSubmit() {
            if (!this.title || !this.body) {
                alert("Please add a Title and Body");
                return;
            }

            const newArticle = {
                title: this.title,
                body: this.body,
            };

            this.$emit("send-post-request", newArticle);

            this.title = "";
            this.body = "";
        },
        updateArticle(id) {
            if (!this.title || !this.body) {
                alert("Please add a Title and Body");
                return;
            }

            const updatedArticle = {
                title: this.title,
                body: this.body,
            };

            this.$emit("send-update-request", id, updatedArticle);
        },
        scrollToElement() {
            const el = this.$refs.me;

            if (el) {
                // Use el.scrollIntoView() to instantly scroll to the element
                el.scrollIntoView({ behavior: "smooth" });
            }
        },
        warnDisabled() {
            this.disabled = true;
            setTimeout(() => {
                this.disabled = false;
            }, 1500);
        },
    },
    computed: {
        articleLocal() {
            this.title = this.article ? this.article.title : "";
            this.body = this.article ? this.article.body : "";

            return { ...this.article };
        },
    },
    updated() {
        this.scrollToElement();                
    },    
    emits: ["close-form", "send-update-request", "send-post-request"],
};
</script>

<style scoped>
.shake {
    animation: shake 0.82s cubic-bezier(0.36, 0.07, 0.19, 0.97) both;
    transform: translate3d(0, 0, 0);
}

@keyframes shake {
    10%,
    90% {
        transform: translate3d(-1px, 0, 0);
    }

    20%,
    80% {
        transform: translate3d(2px, 0, 0);
    }

    30%,
    50%,
    70% {
        transform: translate3d(-4px, 0, 0);
    }

    40%,
    60% {
        transform: translate3d(4px, 0, 0);
    }
}
</style>
