<template>
    <div class="col-md-6 mx-auto" >
        <h1>Create new Post here</h1>
        <form @submit.prevent="storePost">
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input v-model="title" type="text" class="form-control" id="title">
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Title:</label>
                <textarea v-model="post_text" name="body" id="body" rows="5" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category:</label>
                <select name="category_id" id="category" class="form-control">
                    <option value="">Select Category</option>
                    <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
                </select>
            </div>

            <p>Title: {{ title }}</p>
            <p>Body: {{ post_text }}</p>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>
<script>
export default {
    data() {
        return {
            categories: {},
            title: '',
            post_text: ''
        }
    },
    mounted() {
        axios.get('/api/categories')
            .then(response => {
                this.categories = response.data.data;
            });
    },
    methods: {
        storePost(){

        }
    },
}
</script>

<style lang="">

</style>
