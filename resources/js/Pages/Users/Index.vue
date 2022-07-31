<template>
    <Head title="Users" />
    <div class= "flex justify-between mb-6">
        <div class= "flex items-center">
            <h1 class="text-3xl ">Users</h1>
            <Link v-if="can.createUser" href="/users/create" class="text-blue-500 text-sm ml-2">New User</Link>
        </div>
        
        <input v-model="search" type="text" placeholder="Search..." class="border px-2 rounded-lg"/>
    </div>
    
    <table class="w-full table-auto rounded-sm">
        <!--
        <thead>
            <tr>
            <th
                class="px-4 py-4 text-left bg-blue-900 text-white text-sm font-medium"
            >
                Restaurant
            </th>
            <th
                class="px-4 py-4 text-left bg-blue-900 text-white text-sm font-medium"
            >
                Food
            </th>
            <th
                class="px-4 py-4 text-left bg-blue-900 text-white text-sm font-medium"
            >
                Date Eaten
            </th>
            <th
                class="px-4 py-4 text-left bg-blue-900 text-white text-sm font-medium"
            >
                Rating
            </th>
            <th
                class="px-4 py-4 text-left bg-blue-900 text-white text-sm font-medium"
            >
                Price
            </th>
            </tr>
        </thead>
        -->
        <tbody>
            <tr class="border-gray-300 even:bg-gray-300" v-for="(user,index) in users.data" :key="user.id">            
                <td class="px-4 py-8 border-t border-b border-gray-300 text-sm font-weight-700">
                    {{ countMeNow(index, page ) }}
                </td>
                <td class="px-4 py-8 border-t border-b border-gray-300 text-sm font-weight-700">
                    {{ user.name }}
                </td>
                
                <td class="px-4 py-8 border-t border-b border-gray-300 text-sm font-weight-700">
                    <div v-if="user.can.edit" class="inline-block rounded-sm font-medium border border-solid cursor-pointer text-center text-xs py-1 px-2 text-black bg-gray-200 border-gray-200 hover:bg-gray-400 hover:border-gray-400" type="">
                        <Link :href="'/users'+user.id+'/edit'">
                            Edit
                        </Link>
                    </div>
                    <div class="inline-block rounded-sm font-medium border border-solid cursor-pointer text-center text-xs py-1 px-2 text-white bg-red-600 border-red-600 hover:bg-red-800 hover:border-red-800" type="">
                        <Link :href="'/users'+user.id+'/edit'">Delete</Link>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    
    <!--****PAGINATE****-->
    <Pagination :links="users.links" class="mt-6" />
    <div class="mt-6">
        <!--<Link 
            v-for="link in users.links" 
            :href="link.url" 
            v-html="link.label" 
        />-->
        <!--<template v-for="link in users.links">
            <Link
                v-if="link.url"
                :href="link.url"
                v-html="link.label"
            />
            <span v-else v-html="link.label"></span>
        </template>-->
        <!--<Component 
            :is="link.url ? 'Link':'span'"
            v-for="link in users.links" 
            :href="link.url" 
            v-html="link.label"
            class="px-1"
            :class="link.url ? '': 'text-gray-500'"
        />-->
    </div>
    
    
    <!--
    <div class="flex flex-col">
        <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class= "shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">
                                    Title
                                </th>
                                <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            
                                        </div>
                                        <div class="ml-4">
                                            <div class="text sm font-medium text-gray-900">
                                                Jane Cooper
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                jane.cooper@example.com
                                            </div>
                                            <div class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>-->
    <!--
    <ul>
        <li 
            v-for="user in users"
            :key="user.id"
            v-text="user.name"
        />
        
    </ul>
    
    <div style="margin-top: 400px">
        <p>The current time is {{ time }}.</p>
        <Link 
            href='/users' 
            class='text-blue-500'
            preserve-scroll
        >
            Refresh
        </Link>
    </div>-->
</template>
<script>
export default{
    methods: {
        countMeNow(cc, cp){
            alert(cp)
            if(cp>1){
                cp=cp-1*10
                cc=cp+cc
            }
            cc = cc+1;
            return cc;
        }
    }
}
</script>
<script setup>
//import Layout from '../Shared/Layout';
import Pagination from '../../Shared/Pagination';
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import debounce from "lodash/debounce";
//import throttle from "lodash/throttle";
/*
export default{
    //layout: Layout,
    props: { time: String }
};*/
//defineProps({time: String });

let props = defineProps({ 
    users: Object,
    filters: Object,
    can: Object
});
let search = ref(props.filters.search);
/*watch(search, throttle(value =>{
    console.log('triggered');
    //console.log('changed '+value);
    Inertia.get('/users',{ search: value }, {
        preserveState: true,
        replace: true
    });
}, 500))*/
watch(search, debounce(value =>{
    //console.log('triggered');
    //console.log('changed '+value);
    Inertia.get('/users',{ search: value }, {
        preserveState: true,
        replace: true
    });
}, 300))
</script>