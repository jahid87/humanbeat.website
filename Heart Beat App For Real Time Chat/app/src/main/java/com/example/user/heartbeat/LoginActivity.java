package com.example.user.heartbeat;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class LoginActivity extends AppCompatActivity {

    private EditText Name;
    private EditText Password;
    private Button Login;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        getSupportActionBar().hide();

        Name = (EditText)findViewById(R.id.etName);
        Password = (EditText)findViewById(R.id.etPassword);
        Login = (Button)findViewById(R.id.btnLogin);

        Login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                validate(Name.getText().toString(), Password.getText().toString());
            }
        });
    }

    private void validate(String userName, String userPassword){
        if((userName.equals("doctor")) && (userPassword.equals("1234"))){
            Intent intent = new Intent(LoginActivity.this,DocActivity.class);
            startActivity(intent);

        }
        else if((userName.equals("patient")) && (userPassword.equals("1234"))){
            Intent intent = new Intent(LoginActivity.this,PatientActivity.class);
            startActivity(intent);

        }

        else{
            Login.setEnabled(false);
        }



    }
}
