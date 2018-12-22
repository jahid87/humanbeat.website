package com.example.user.heartbeat;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;

public class PpatientActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_ppatient);
        getSupportActionBar().hide();
    }
}
