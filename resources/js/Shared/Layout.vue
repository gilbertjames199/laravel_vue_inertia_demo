<template>
    <Head>
        <title>My App</title>
        <meta type="description" content="Information about my app" head-key="description" />
    </Head>
    <section class="p-6 bg-gray-200">
        <header class="flex justify-between">
            <div class="flex items-center">
                <h1 class="font-bold text-lg">
                    My App
                </h1>
                <p class="text-small ml-4">Welcome back, {{ username }}!</p>
            </div>
            <Nav />
        </header>
    </section>
    <section class="p-6">
        <div class="max-w-3xl mx-auto">
            <!--
            <iframe
                class="mb-6" 
                width="100%"
                frameborder="no" 
                scrolling="no" 
                seamless src="https://player.simplecast.com/fd0bd2ba-c553-466c-a060-b144797ce369?dark=false"
            >
            </iframe>
            -->
            <slot />
        </div>
    </section>
</template>
<script>
import Nav from "./Nav";
import { Head } from "@inertiajs/inertia-vue3";

export default{
    components: { Nav, Head },
    computed: {
        username(){
            return this.$page.props.auth.user.username;
        }
    }
}
</script>