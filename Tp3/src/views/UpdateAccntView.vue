<template>
    <UpdateAccntForm @update="callback"></UpdateAccntForm>
    <UpdatePassForm></UpdatePassForm>
</template>

<script>
    import { ref } from 'vue';
    import UpdateAccntForm from '@/components/UpdateAccntForm.vue';
    import UpdatePassForm from '@/components/UpdatePassForm.vue';

    export default {
        props: {
            id: String,
        },
        components: {
            UpdateAccntForm,
            UpdatePassForm
        },
        setup(props) {
            let callback = () => {
                console.log('callback')
            }
            
            return {
                callback
            }
        },
        mounted(){
            document.title = "Account Information Update";
        },
        
    }
</script>

<style scoped>

</style>