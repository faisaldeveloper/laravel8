<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Category US
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <p>This is Category Us page.</p>



                    <table class="table-auto">
                      <thead>
                        <tr>
                          <th class="px-4 py-2">ID</th>
                          <th class="px-4 py-2">Name</th>
                          <th class="px-4 py-2">Views</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="row in categories">
                          <td class="border px-4 py-2">{{row.id}}</td>
                          <td class="border px-4 py-2">{{row.name}}</td>
                          <td class="border px-4 py-2">View</td>
                        </tr>                      
                      </tbody>
                    </table>

                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from './../../Layouts/AppLayout'

    export default {
        name: "Categorylist",
        components: {
            AppLayout,
        },
        props: ['categories'],       
        
    }
</script>
