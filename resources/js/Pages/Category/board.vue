<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Trello Boardddd
            </h2>
        </template>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-yellow overflow-hidden shadow-xl sm:rounded-lg">    
           
    <!-- component -->
    <div class="bg-yellow w-full h-screen font-sans">
        <div class="flex p-2 bg-blue-dark items-center">
                <div class="hidden md:flex justify-start">
                    <button class="bg-blue-light rounded p-2 font-bold text-black text-sm mr-2 flex">
                        <svg class="fill-current text-black h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50"><path d="M41 4H9C6.24 4 4 6.24 4 9v32c0 2.76 2.24 5 5 5h32c2.76 0 5-2.24 5-5V9c0-2.76-2.24-5-5-5zM21 36c0 1.1-.9 2-2 2h-7c-1.1 0-2-.9-2-2V12c0-1.1.9-2 2-2h7c1.1 0 2 .9 2 2v24zm19-12c0 1.1-.9 2-2 2h-7c-1.1 0-2-.9-2-2V12c0-1.1.9-2 2-2h7c1.1 0 2 .9 2 2v12z"/></svg>
                        Pannels
                    </button>
                    <input type="text" class="bg-blue-light rounded p-2">
                </div>
                <div class="mx-0 md:mx-auto">
                    <h1 class="text-blue-lighter text-xl flex items-center font-sans italic">
                        <svg class="fill-current h-8 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50"><path d="M41 4H9C6.24 4 4 6.24 4 9v32c0 2.76 2.24 5 5 5h32c2.76 0 5-2.24 5-5V9c0-2.76-2.24-5-5-5zM21 36c0 1.1-.9 2-2 2h-7c-1.1 0-2-.9-2-2V12c0-1.1.9-2 2-2h7c1.1 0 2 .9 2 2v24zm19-12c0 1.1-.9 2-2 2h-7c-1.1 0-2-.9-2-2V12c0-1.1.9-2 2-2h7c1.1 0 2 .9 2 2v12z"/></svg>
                        Trello
                    </h1>
                </div>
                <div class="flex items-center ml-auto">
                    <button class="bg-blue-light rounded h-8 w-8 font-bold text-black text-sm mr-2">+</button>
                    <button class="bg-blue-light rounded h-8 w-8 font-bold text-black text-sm mr-2">i</button>
                    <button class="bg-red rounded h-8 w-8 font-bold text-black text-sm mr-2">
                        <svg class="h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2c-.8 0-1.5.7-1.5 1.5v.688C7.344 4.87 5 7.62 5 11v4.5l-2 2.313V19h18v-1.188L19 15.5V11c0-3.379-2.344-6.129-5.5-6.813V3.5c0-.8-.7-1.5-1.5-1.5zm-2 18c0 1.102.898 2 2 2 1.102 0 2-.898 2-2z"/></svg>
                    </button>
                    <img src="https://i.imgur.com/OZaT7jl.png" class="rounded-full" />
                </div>
        </div>
        <div class="flex m-4 justify-between">
                <div class="flex">
                    <h3 class="text-black mr-4">TailwindComponents.com</h3>
                    <ul class="list-reset text-black hidden md:flex">
                        <li><span class="font-bold text-lg px-2">☆</span></li>
                        <li><span class="border-l border-blue-lighter px-2 text-sm">Business Name</span> <span class="rounded-lg bg-blue-light text-xs px-2 py-1">Free</span></li>
                        <li><span class="border-l border-blue-lighter px-2 text-sm ml-2">Team Visible</span></li>
                    </ul>
                </div>
                <div class="text-black font-sm text-underlined hidden md:flex items-center underline">
                    <svg class="h-4 fill-current text-black cursor-pointer mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5 10a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4z"/></svg>
                    Show menu
                </div>
        </div>

            <!--  trello cards main -->
                <draggable element="div" class="flex px-2 pb-8" v-model="categories" :options="dragOptions1">
                <transition-group class="flex px-2">

                <div class="flex px-2 pb-8 items-start" v-for="element,index in categories" :key="element.id">               

                <div class="rounded bg-gray-500  flex-no-shrink w-64 p-2 mr-3">
                    
                <div class="flex justify-between py-1">
                    <h3 class="text-sm"><b>{{element.name}}</b></h3>
                    <svg class="h-4 fill-current text-grey-dark cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5 10a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4z"/></svg>
                </div>
                    
                        <!--  trello cards sub -->                        
                        <draggable element="div" @end="changeOrder" v-model="element.tasks" :options="dragOptions">             
                        <transition-group :id="element.id">
                            <div v-for="task,index in element.tasks" :key="task.category_id+','+task.order" class="transit-1" :id="task.id">
                                <div class="bg-white p-2 rounded mt-1 border-b border-grey cursor-pointer hover:bg-grey-lighter">
                            <div class="text-sm mt-2">
                            <label for="checkbox">{{ task.name }} - 55</label>
                            
                            </div>
                            </div>
                            </div>
                        </transition-group>                        
                        </draggable>
                        <!--  end trello cards sub -->


                        <p class="mt-3 bg-indigo-200 text-grey-dark">
                            <form @submit.prevent="submit2(index)">
                            <input type="text" name="tname" v-model="tname" placeholder="add new task">                        
                            <button type="submit">Add</button>
                        </form>
                        </p> 
                </div>                          
                </div>
                </transition-group>
                </draggable>      <!-- end trello cards main -->     
        
    </div><!-- end component -->
  
            </div>
        </div>
    </div>
    </app-layout>       
</template>


<script>
        import AppLayout from './../../Layouts/AppLayout';
        import draggable from 'vuedraggable';

        export default {
            name: "Trello",
            components: {
                AppLayout,
                draggable
            },
            props: ['categories', 'tasks'],

            data(){
                return {
                    tname,
                    form: {
                        name:'',
                        category_id: '',
                        user_id: '',
                        order: ''
                    }
                }
            },            
            methods : {
                submit2(id) {
                    //console.log(this.form.name[index]);
                   // this.name = submitEvent.target.elements.name.value

                    
                    var f = this.getformfields;
                    console.log(f);

                    alert('adding new:'+this.tname);

                    
                    this.form.name = 'mkjhg';
                    this.form.category_id = this.categories[id].id;
                    this.form.user_id = 1;
                    this.form.order = this.categories[id].tasks.length;
                    
                    //console.log(this.form);

                    this.$inertia.post('/task', this.form)
                },                
                loadTasks() {
                },
                changeOrder(data){
                },
                endEditing(task) {
                },
                editTask(task){
                    this.editingTask = task
                }
            },
            mounted(){
            },
            computed: {
                dragOptions () {
                  return  {
                    animation: 1,
                    group: 'description',
                    ghostClass: 'ghost'
                  };
                },
                getformfields(){
                    return {                    
                        form: {
                            name:'',
                            category_id: '',
                            user_id: '',
                            order: ''
                        }
                    };
                },
            }
            
    }
    </script>

    <style scoped>
   
    </style>