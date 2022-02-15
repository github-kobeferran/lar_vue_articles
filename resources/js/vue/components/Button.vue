<template>
    <button @click.prevent="clicked()" class="btn mx-2" :class="color">  
        <h5> {{text}}     </h5> 
        <font-awesome-icon v-if="icon" :icon="icon" />
    </button>
</template>

<script>

export default {
    name: 'Button',
    data() {
        return {}
    },
    props: {
        text: String,
        color: String,
        icon: String,
        type: {
            default: "add",
            type: String            
        }
    },
    methods: {
        clicked() {  
            
            // if(this.type == 'add'){
            //     this.$emit('toggle-add')                
            // } else if (this.type == 'edit') {
            //     this.$emit('toggle-edit')
            // }


            // if(this.mode === 'edit'){
            //     this.$emit('toggleEdit')
            //     this.mode = 'cancel-edit'
            // }else if (this.mode === 'delete'){
            //     this.$emit('toggleDelete')
            //     this.mode = 'delete'
            // } else if (this.mode === 'cancel-add'){
            //     this.$emit('toggleAdd')
            //     this.mode = 'add'
            // } else if (this.mode === 'cancel-edit'){
            //     this.$emit('toggleAdd')
            //     this.mode = 'add'
            // } else {
            //     this.$emit('toggleAdd')
            //     this.mode = 'cancel-add'
            // }
        }
    }
}
</script>

<style scoped>
    
</style>