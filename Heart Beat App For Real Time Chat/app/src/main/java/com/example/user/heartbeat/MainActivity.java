package com.example.user.heartbeat;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class MainActivity extends AppCompatActivity {
    private Button button1;
    private Button button2;
    private Button button3;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        getSupportActionBar().hide();
        button1= (Button) findViewById(R.id.docButton);
        button2= (Button) findViewById(R.id.patientButton);
        button3= (Button) findViewById(R.id.aboutButton);


        button1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openLoginActivity();

            }
        });
        button2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openLoginActivity();

            }
        });
        button3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openAboutActivity();

            }
        });

    }


    public void openLoginActivity(){
        Intent intent = new Intent(this, LoginActivity.class);
        startActivity (intent);
    }
    public void openAboutActivity (){
        Intent intent = new Intent(this, AboutActivity.class);
        startActivity (intent);
    }
}




