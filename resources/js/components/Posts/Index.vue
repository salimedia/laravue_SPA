<template lang="">
    <div class="container">
        <div class="form-group col-md-3 my-4">
            <select v-model="category_id" name="category" id="category" class="form-control">
                <option value="" selected >-- Choose Category --</option>
                <option v-for="category in categories" :value="category.id" >{{ category.name }}</option>
            </select>
        </div>
        <div v-if="posts.data" >
            <table class="table table-striped">
                <thead>
                    <tr class="text-primary">
                        <th>#</th>
                        <th>
                            <a href="#" @click.prevent="change_sort('title')" class="text-decoration-none" >Title</a>
                            <span v-if="sort_direction == 'asc' && sort_field =='title' " ><i class="fas fa-arrow-up"></i></span>
                            <span v-if="sort_direction == 'desc' && sort_field =='title' "><i class="fas fa-arrow-down"></i></span>
                        </th>
                        <th>
                            <a href="#" @click.prevent="change_sort('post_text')" class="text-decoration-none"> Text</a>
                            <span v-if="sort_direction == 'asc' && sort_field =='post_text' " ><i class="fas fa-arrow-up"></i></span>
                            <span v-if="sort_direction == 'desc' && sort_field =='post_text' "><i class="fas fa-arrow-down"></i></span>
                        </th>
                        <th>
                            <a href="#" @click.prevent="change_sort('created_at')" class="text-decoration-none">Date</a>
                            <span v-if="sort_direction == 'asc' && sort_field =='created_at' " ><i class="fas fa-arrow-up"></i></span>
                            <span v-if="sort_direction == 'desc' && sort_field =='created_at' "><i class="fas fa-arrow-down"></i></span>
                        </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="post in posts.data" >
                        <td scope="row">{{ post.id }}</td>
                        <td>{{ post.title }}</td>
                        <td>{{ post.body.substring(0,50) }}</td>
                        <td>{{ post.created_at }}</td>
                        <td></td>
                    </tr>

                </tbody>
            </table>
            <pagination :data="posts" @pagination-change-page="getResults"></pagination>
        </div>
        <div v-else class="col-md-6 mx-auto my-5 text-center">
            <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                posts: {},
                categories: {},
                category_id: '',
                sort_field: 'created_at',
                sort_direction: 'desc'
            }
        },
        mounted() {
            axios.get('/api/categories')
                .then(response => {
                    this.categories = response.data.data;
                });
            this.getResults();
        },
        watch: {
            category_id(value) {
                this.getResults();
            }
        },
        methods: {
            change_sort(field) {
                if (this.sort_field === field) {
                    this.sort_direction = this.sort_direction === 'asc' ? 'desc' : 'asc';
                } else {
                    this.sort_field = field
                    this.sort_direction = 'asc';
                }
                this.getResults();

            },
            // Our method to GET results from a Laravel endpoint
            getResults(page = 1) {
                axios.get('/api/posts?page=' +
                        page +
                        '&category_id=' + this.category_id +
                        '&sort_field=' + this.sort_field +
                        '&sort_direction=' + this.sort_direction)
                    .then(response => {
                        this.posts = response.data;
                    });
            }
        }
    }
</script>