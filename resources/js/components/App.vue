<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Vue SPA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <router-link exact :to="{name:'posts.index'}" class="nav-link" >Posts List</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link exact :to="{name:'posts.create'}" class="nav-link" >Add New Post</router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="py-4">
            <div class="container">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>
<script>

export default {

}
</script>
<style lang="">

</style>
