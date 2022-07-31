<template>
    <Head title="Create User" />
    <h1 class="text-3xl">Create New User</h1>

    <form @submit.prevent="submit" method="POST" action="/" class="max-w-md mx-auto mt-8">
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="name"
            >
                Name
            </label>
            
            <input v-model="form.name" class="border border-gray-400 p-2 w-full"
                    type="text"
                    name="name"
                    id="name"
                    required
            >

            <div v-if="form.errors.name" v-text="form.errors.name" class="text-red-500 text-xs mt-1">
            </div>
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="email"
            >
                E-mail
            </label>
            <input v-model="form.email" class="border border-gray-400 p-2 w-full"
                    type="email"
                    name="email"
                    id="email"
                    required
            >
            <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs mt-1">
            </div>
        </div>
        <!--PASSWORD-->
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="password"
            >
                password
            </label>
            <input v-model="form.password" class="border border-gray-400 p-2 w-full"
                    type="password"
                    name="password"
                    id="password"
            >
            <div v-if="form.errors.password" v-text="form.errors.password" class="text-red-500 text-xs mt-1">
            </div>
        </div>
        <!--END OF PASSWORD-->

        <!--CONFIRM PASSWORD-->
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="pass_con"
            >
                Confirm Password
            </label>
            <input v-model="form.pass_con" class="border border-gray-400 p-2 w-full"
                    type="password"
                    name="pass_con"
                    id="pass_con"
            >
            <div v-if="form.errors.pass_con" v-text="form.errors.password" class="text-red-500 text-xs mt-1">
            </div>
        </div>
        <!--END OF CONFIRM PASSWORD-->
        <!--SUBMIT BUTTON-->
        <div class="mb-6">
            <button type="submit" 
                    class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                    :disabled="form.processing"
            >
                Submit
            </button>
        </div>
        <!--END OF SUBMIT BUTTON-->
    </form>
</template>
<script>
import { ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";


</script>
<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";

    defineProps({
        errors: Object
    });
    let form = useForm({
        name: '',
        email: '',
        password: '',
        pass_con: '',
    });
    /*
    setTimeout(()=>{
        form.reset();
    }, 3000);*/
    let processing = ref(false);
    let submit = () =>{
        //processing.value= true;
        form.post('/users');
    }; 
</script>