import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import { useFormik } from 'formik';
import { ToastContainer, toast } from 'react-toastify';


function AccountAddEdit() {


    const formik = useFormik({
        initialValues: {
            user_name: '',
            full_name:'',
            email:'',
            contact_number:'',
            password_confirmation:'',
            password:''
        },
        onSubmit: values => {
          console.log(values)
        },
      });
    return (
        <div>

        <form className="pt-3"  onSubmit={(e)=>{e.preventDefault()
        console.log(lsdjfl)
        }



}>



    <div className="form-group">
        <input type="text"  name="user_name" className="form-control form-control-lg @error('user_name'"  placeholder="User Name" onChange={formik.handleChange} value={formik.values.user_name} required autocomplete="user_name" autofocus/>
                    {/* @error('user_name')
        <span className="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror */}
            </div>
            <div className="form-group">
                <input type="text"  name="full_name" className="form-control form-control-lg  "  placeholder="Full Name" onChange={formik.handleChange} value={formik.values.full_name} required autocomplete="full_name" autofocus/>
                            {/* @error('full_name')
                <span className="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror */}
                    </div>

                    <div className="form-group">
                        <input type="text"  name="contact_number" className="form-control form-control-lg "  placeholder="Contact Number" onChange={formik.handleChange} value={formik.values.contact_number} required autocomplete="contact_number" autofocus/>
                                    {/* @error('contact_number')
                        <span className="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror */}
                            </div>

    <div className="form-group">
    <input type="email"  name="email" className="form-control form-control-lg @error('email') "  placeholder="Email" onChange={formik.handleChange} value={formik.values.email} required autocomplete="email" autofocus/>
    <span className="invalid-feedback" role="alert">
            {/* <strong>{{ $message }}</strong> */}
        </span>
        </div>
                <div className="form-group">
                    <input placeholder="password" type="password" className="form-control form-control-lg" value={formik.values.password} onChange={formik.handleChange} name="password" required autocomplete="new-password"/>
                </div>
                <div className="form-group">
                    <input placeholder="confirm password" type="password" className="form-control form-control-lg" value={formik.values.password_confirmation} onChange={formik.handleChange} name="password_confirmation" required autocomplete="new-password"/>
                </div>
            <div className="mt-3">
                <button type="submit" className="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Submit</button>
            </div>


</form>

<button onClick={()=>console.log("jls;dkfj")} className="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Submit</button>

        </div>
    );
}

export default AccountAddEdit;

if (document.getElementById('account-add-edit')) {
    ReactDOM.render(<AccountAddEdit />, document.getElementById('account-add-edit'));
}
