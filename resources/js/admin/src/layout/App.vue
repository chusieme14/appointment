<template>
    <v-app>
        <div class="d-flex class-main-container">
            <v-navigation-drawer
                class=" accent-4"
                dark
                permanent
            >
                <v-list>
                    <v-list-item
                        v-for="item in items"
                        :key="item.title"
                        link
                        :class="getCurrentUrl == item.name ? 'active' : ''"
                    >
                    <v-list-item-icon>
                        <v-icon>{{ item.icon }}</v-icon>
                    </v-list-item-icon>

                    <router-link class="mt-2" tag="v-list-item-content" :to="{ name: item.name }">
                        <p>{{ item.title }}</p>
                    </router-link>
                    <!-- <v-list-item-content>
                        <v-list-item-title>{{ item.title }}</v-list-item-title>
                    </v-list-item-content> -->
                    </v-list-item>
                </v-list>

                <template v-slot:append>
                    <div class="pa-2">
                        <v-btn @click="logout" block>
                            Logout
                        </v-btn>
                    </div>
                </template>
            </v-navigation-drawer>
            <div class="class-content">
                <router-view></router-view>
            </div>
        </div>
    </v-app>
</template>
<script>
import MainHeader from './header'
import Navbar from './navbar'
export default {
    components:{
        MainHeader,
        Navbar
    },
    data(){
        return{
            items: [
                { title: 'Dashboard', icon: 'mdi-view-dashboard', name:'dashboard' },
                { title: 'Appointment', icon: 'mdi-account-box', name:'appointment' },
                { title: 'Admin', icon: 'mdi-gavel' },
            ],
        }
    },
    methods:{
        logout(){
            axios.get(`api/logout`).then(({data})=>{
                this.$router.push({name:'login'})
            })
        }
    },
    computed:{
        getCurrentUrl() {
            let url = this.$route.fullPath;
            let parts = url.split("/");
            console.log(parts[2],"parts[2]")
            return parts[2];
        },
    }
}
</script>
<style lang="scss" scoped>
.class-main-container{
    height: 100%;
}
.class-content{
    margin: 40px;
    width: 85%;
}
.active {
	color: #0470a8 !important;
    background-color: gray;
}
</style>