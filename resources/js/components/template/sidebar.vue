<template>
    <div id="sidebar" class='active'>
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <img src="/images/logo.svg" alt="" srcset="">
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class='sidebar-title'>Main Menu</li>
                    <router-link to="/candidato" v-slot="{ href,navigate, isActive, isExactActive }" custom>
                        <li class="sidebar-item" :class="[isActive && 'active', isExactActive && '']">
                            <a :href="href" @click="navigate" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Me Candidatar</span>
                            </a>
                        </li>
                    </router-link>
                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>
</template>
