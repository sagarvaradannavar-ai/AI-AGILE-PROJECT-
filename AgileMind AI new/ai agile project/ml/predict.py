
import pandas as pd
from sklearn.ensemble import RandomForestRegressor
from sklearn.model_selection import train_test_split
from sklearn.metrics import mean_absolute_error
import os

# Load historical task dataset
file_path = os.path.join(os.path.dirname(__file__), "tasks_dataset.csv")

if not os.path.exists(file_path):
    print("Dataset not found!")
    print("Create tasks_dataset.csv inside the ml folder.")
    raise SystemExit

data = pd.read_csv(file_path)

# Input features
features = [
    "estimated_hours",
    "complexity",
    "priority",
    "workload"
]

target = "actual_days"

# Check dataset
if not all(col in data.columns for col in features + [target]):
    raise ValueError("Dataset columns are missing.")

# Convert text values into numbers
data["complexity"] = data["complexity"].map({
    "Easy": 1,
    "Medium": 2,
    "Hard": 3
})

data["priority"] = data["priority"].map({
    "Low": 1,
    "Medium": 2,
    "High": 3
})

data = data.dropna(subset=features + [target])

if len(data) < 10:
    print("Please provide at least 10 valid training records.")
    raise SystemExit

X = data[features]
y = data[target]

# Split dataset
X_train, X_test, y_train, y_test = train_test_split(
    X, y, test_size=0.2, random_state=42
)

# Train Random Forest model
model = RandomForestRegressor(
    n_estimators=100,
    random_state=42
)

model.fit(X_train, y_train)

# Evaluate model
predictions = model.predict(X_test)

mae = mean_absolute_error(y_test, predictions)

print("Model Training Successful!")
print("Mean Absolute Error:", round(mae, 2), "days")

# Example prediction
new_task = pd.DataFrame([{
    "estimated_hours": 12,
    "complexity": 2,
    "priority": 3,
    "workload": 2
}])

predicted_days = model.predict(new_task)[0]

print("Predicted Completion Time:",
      round(predicted_days, 2), "days")
