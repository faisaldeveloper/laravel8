<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Contact US - {{ msg }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <p>This is Contact Us page.</p>
                </div>              
                
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from './../Layouts/AppLayout'
    //import LoadingButton from '@/Shared/LoadingButton'

    export default {
        name: 'Contactus',
        components: {
            AppLayout,
        },
        props: ['msg'],
        data(){
                return {                    
                    form: {name:''},               
                    tname:''
                }
        },
        methods : {
            submit2() {             
                if(this.tname =='') return;

                this.form.name = this.tname;
                this.$inertia.post(this.route('home.mytest'), this.form);               
                this.tname='';
            },  
        }
    }
</script>
