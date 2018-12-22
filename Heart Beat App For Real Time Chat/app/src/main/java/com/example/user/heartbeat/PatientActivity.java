package com.example.user.heartbeat;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class PatientActivity extends AppCompatActivity {
    private Button button1;
    private Button button2;
    private Button button3;
    private Button button4;
    private Button button5;
    private Button button6;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_patient);
        getSupportActionBar().hide();

        button1= (Button) findViewById(R.id.ecgButton);
        button2= (Button) findViewById(R.id.pulseButton);
        button3= (Button) findViewById(R.id.dpButton);
        button4= (Button) findViewById(R.id.contactButton);
        button5= (Button) findViewById(R.id.mmovementButton);
        button6= (Button) findViewById(R.id.btemperatureButton);

        button1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openEcgActivity();

            }
        });
        button2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openPulseActivity();

            }
        });
        button3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openDprofileActivity();

            }
        });
        button4.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openEcontactActivity();

            }
        });
        button5.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openMmovementActivity();
            }
        });
        button6.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openBtemperaturetActivity();
            }
        });



    }

    public void openEcgActivity(){
        Intent intent = new Intent(this, EcgActivity.class);
        startActivity (intent);
    }
    public void openPulseActivity(){
        Intent intent = new Intent(this, PulseActivity.class);
        startActivity (intent);
    }
    public void openDprofileActivity (){
        Intent intent = new Intent(this, DprofileActivity.class);
        startActivity (intent);
    }
    public void openEcontactActivity (){
        Intent intent = new Intent(this, EcontactActivity.class);
        startActivity (intent);
    }
    public void openMmovementActivity(){
        Intent intent = new Intent(this, MmovementActivity.class);
        startActivity(intent);
    }
    public void openBtemperaturetActivity(){
        Intent intent = new Intent(this, BtemperatureActivity.class);
        startActivity(intent);
    }


}
