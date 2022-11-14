import axios from "axios";
import React, { Component } from "react";
import { Link } from 'react-router-dom';

class Addstudent extends Component {

    state = {
        surname: "",
        othername: "",
        classs: "",
        class_arm: "",
        dob: "",
        passport: "",
    };

    handleInput = (e) => {
        this.setState({
            [e.target.name]: e.target.value
        });
    }

    saveStudent = async (e) => {
        e.preventDefault();

        const res = await axios.post('http://127.0.0.1:8000/api/add_student', this.state);
        if(res.data.status === 200){
            console.log(res.data.message);
            this.setState({
                surname: "",
                othername: "",
                class: "",
                class_arm: "",
                dob: "",
                passport: "",
            });
        }
    }

    render() {
        return (
            <div className="container">
                <div className="row">
                    <div className="col-md-6">
                        <div className="card">
                            <div className="card-header">
                                <h4>
                                    Add Student
                                    <Link to={'/'} className="btn btn-primary btn-sm float-end"> Back </Link>
                                </h4>
                            </div>
                            <div className="card-body">
                                <form onSubmit={this.saveStudent}>
                                    <div className="form-group mb-3">
                                        <label> Surname:</label>
                                        <input value={this.state.surname} onChange={this.handleInput} type="text" name="surname" className="form-control" />
                                    </div>
                                    <div className="form-group mb-3">
                                        <label> Othername:</label>
                                        <input value={this.state.othername} onChange={this.handleInput} type="text" name="othername" className="form-control" />
                                    </div>
                                    <div className="form-group mb-3">
                                        <label> Class: </label>
                                        <select className="form-control" value={this.state.class} onChange={this.handleInput} name="class">
                                            <option value={"1"}>Class</option>
                                        </select>
                                    </div>
                                    <div className="form-group mb-3">
                                        <label> Class Arm: </label>
                                        <select className="form-control" value={this.state.classarm} onChange={this.handleInput} name="classarm">
                                            <option value={"1"}>arm</option>
                                        </select>
                                    </div>
                                    <div className="form-group mb-3">
                                        <label> DOB: </label>
                                        <input value={this.state.dob} onChange={this.handleInput} type="date" name="dob" className="form-control" />
                                    </div>
                                    <div className="form-group mb-3">
                                        <label> Passport: </label>
                                        <input value={this.state.passport} onChange={this.handleInput} type="file" name="passport" className="form-control" />
                                    </div>
                                    <div className="form-group mb-3">
                                        <button type="submit" name="submit" className="btn btn-primary">Register Student</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        )
    }
}

export default Addstudent;
