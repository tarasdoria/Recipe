<template>
    <nav class="navbar navbar-expand-lg">
        <ul class="navbar-nav container">
            <li class="nav-item">
                <a class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">About us</a>
            </li>
        </ul>
<!--        <div class="ml-auto">-->
<!--            <ul class="navbar-nav inline">-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" @click="randomizePrice">End day</a>-->
<!--                </li>-->
<!--                <li class="nav-item dropdown">-->
<!--                    <a class="nav-link dropdown-toggle" @click="activeDropdown">-->
<!--                        Save & Load-->
<!--                    </a>-->
<!--                    <div class="dropdown-menu" v-if="expendDropdown" :class="[expendDropdown ? activeClass : '']">-->
<!--                        <a class="dropdown-item" @click="saveDay">Save day</a>-->
<!--                        <a class="dropdown-item" @click="loadDay">Load day</a>-->
<!--                    </div>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </div>-->
    </nav>
</template>

<script>
    import {imgLocation} from "../../api";

    export default {
        computed:{
            img(){
                return imgLocation()
            }
        }
    }
</script>

<style scoped>

</style>