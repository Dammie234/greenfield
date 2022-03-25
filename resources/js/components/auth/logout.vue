<template>
    <div>
    
    </div>
</template>

<script>
export default {
    name: 'logout',
    created(){
        localStorage.removeItem('token')
        Toast.fire({
            icon: 'success',
            title: 'Logout successfully'
        })
        this.$router.push({
            name: 'login'
        })
    },
    data() {
        return {

        }
    }
}
</script>

<style scoped>

</style>
