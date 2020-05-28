<template>
    <div>
        <b-container>
            <b-row>
                <b-col>
                    <h1 class="text-center">Student Attendance</h1>
                </b-col>
            </b-row>
            <b-row>
                <b-col>
                    <table class="table" id="student-table">
                        <thead>
                            <tr align='center'>
                                <th scope="col">Select if present</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Present/Absent</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(student, index) in studentList" :key="student.id">
                                <td scope="col"><input type="checkbox" :id="student.id" :value="student" v-model="checkedStudents" @click="checkStudent(index)"></td>
                                <td>{{student.first_name}}</td>
                                <td>{{student.last_name}}</td>
                                <td>{{student.email}}</td>
                                <td>{{student.status}}</td>
                            </tr>
                        </tbody>

                    </table>
                    <!-- <b-form-checkbox-group id="checkbox-group" v-model="checkedStudents">
                        <b-form-checkbox  @click>
                            {{ student.first_name }} {{ student.last_name }}
                            {{ student.status }}
                        </b-form-checkbox>
                    </b-form-checkbox-group> -->
                </b-col>
            </b-row>
        </b-container>
    </div>
</template>

<style scoped>
</style>

<script>
    import axios from 'axios';
    export default {
        data: function(){
            return {
                'studentList': [],
                'checkedStudents': []
            }
        },
        mounted(){
            this.getStudents();
        },
        methods: {
            getStudents: function(){
                let self = this;
                axios.get('/api/students').then(function(response){
                    self.studentList = (response.data.data);
                    self.populateList();
                }).catch(function(error){
                    console.log(error);
                })
            },
            updateAttendance: function(student_id, status){
                let self = this;
                axios.put('/api/student/'+ student_id, {'status': status}).then(function(response){
                    console.log('Success');
                }).catch(function(error){
                    console.log(error);
                })
            },
            populateList: function(){
                for(let student of this.studentList){
                    if(student.status == 'present'){
                        this.checkedStudents.push(student);
                    }
                }
            },
            checkStudent: function(index){
                if(this.studentList[index].status == "present"){
                    this.studentList[index].status = "absent";
                    this.updateAttendance(this.studentList[index].id, "absent");
                } else {
                    this.studentList[index].status = "present";
                    this.updateAttendance(this.studentList[index].id, "present");
                }
            }
        }
    }
</script>
