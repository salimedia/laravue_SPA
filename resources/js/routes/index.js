import PostIndex from './../components/Posts/Index.vue'
import PostCreate from './../components/Posts/Create.vue'

export default {
    mode: 'history',
    routes: [{
            path: '/',
            component: PostIndex,
            name: 'posts.index'
        },
        {
            path: '/create',
            component: PostCreate,
            name: 'posts.create'
        }
    ]
}