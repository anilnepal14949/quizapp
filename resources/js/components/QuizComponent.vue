<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Online Quiz <strong>({{ this.quiz.name }})</strong>
                        <span class="float-right" style="color:#fff;">
                            <span style="background:#000;padding:5px;" v-if="questionIndex!=questions.length">
                            {{ questionIndex+1 }}/{{ questions.length }}
                            </span>
                            <span v-else style="background:#5a5;padding:5px;">Completed</span>
                        </span>
                    </div>

                    <div class="card-body">
                        <span v-if="questionIndex < questions.length" class="float-right" style="color:red">{{ time }}</span>
                        <div v-for="(question,index) in questions" v-bind:key="index">
                            <div v-show="index === questionIndex">
                                {{ question.question }}
                                <ol>
                                    <li v-for="choice in question.answers">
                                        <label for="">
                                            <input type="radio"
                                                :value="choice.is_correct == true?true:choice.answer"
                                                :name="index"
                                                v-model="userResponses[index]"
                                                @click="choices(question.id, choice.id)">
                                            {{ choice.answer }}
                                        </label>
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <div v-show="questionIndex != questions.length">
                            <button class="btn btn-success" @click="previous" :disabled="questionIndex  <= 0"> << Previous </button>
                            <button class="btn btn-success float-right" @click="next(); postUserChoice()"> Next >> </button>
                        </div>
                        <div v-show="questionIndex == questions.length">
                            <p>
                                <center>
                                    Result: {{ score() }}/{{questions.length}}
                                </center>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment';

    export default {
        props: ['quiz', 'duration', 'quizQuestions', 'hasQuizAttempted'],
        data() {
            return {
                questions: this.quizQuestions,
                questionIndex: 0,
                userResponses: Array(this.quizQuestions.length).fill(false),
                currentQuestion: 0,
                currentAnswer: 0,
                clock: moment(this.duration*60*1000)
            }
        },
        mounted() {
            setInterval(() => {
                this.clock = moment(this.clock.subtract(1, 'seconds'))
            }, 1000);
        },
        computed: {
            time() {
                var minsec = this.clock.format('mm:ss');
                if(minsec == '00:00'){
                    alert('Timeout!');
                    window.location.reload();
                }
                return minsec;
            }
        },
        methods: {
            next() {
                this.questionIndex++;
            },
            previous() {
                this.questionIndex--;
            },
            choices(question, answer) {
                this.currentAnswer = answer,
                this.currentQuestion = question
            },
            score() {
                return this.userResponses.filter((val) => {
                    return val === true;
                }).length;
            },
            postUserChoice() {
                axios.post('/quiz/create', {
                    answer_id: this.currentAnswer,
                    question_id: this.currentQuestion,
                    quiz_id: this.quiz.id
                }).then((res) => {
                    console.log(res);
                }).catch((error) => {
                    alert("An error occured!:"+ error.message);
                });
            }
        }
    }
</script>
